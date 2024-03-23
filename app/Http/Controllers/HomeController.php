<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rooms = ChatRoom::where('sender_id', Auth::user()->id)
            ->orWhere('receiver_id', Auth::user()->id)
            ->get();

        $contacted_users = collect();

        foreach ($rooms as $room) {
            if ($room->sender->id != Auth::user()->id) {
                $contacted_users->push($room->sender);
            } elseif ($room->receiver->id != Auth::user()->id) {
                $contacted_users->push($room->receiver);
            }
        }

        $contacted_users = $contacted_users->unique();


        return view("chat.chat", ['rooms' => $rooms, "contacted_users" => $contacted_users]);
    }
}
