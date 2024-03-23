<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatRoomController extends Controller
{

    public function createChatRoom($sender_id, $receiver_id)
    {
        // تحقق من وجود غرفة دردشة بين المستخدمين وإنشاء واحدة إذا لم تكن موجودة
        $chatRoom = ChatRoom::firstOrCreate([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id
        ]);

        return "تم إنشاء غرفة دردشة بنجاح.";
    }

    public function getChatMessages($chat_room_id)
    {
        $messages = ChatMessage::where('chat_room_id', $chat_room_id)->get();
        // return response()->json(['messages' => $messages]);
        return view("chat.chat_room", compact('messages'));
    }


    public function show ($room_id){


        $users = User::all();
        $rooms = ChatRoom::all();

        $room_chat = ChatRoom::find($room_id);

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
        return view("chat.chat_room",["users"=>$users,"rooms"=>$rooms,"room_chat"=>$room_chat,"contacted_users"=>$contacted_users]) ;

    }

    public function searchUser($sender_id, $receiver_id)
    {
        $room = ChatRoom::where('sender_id', $sender_id);

        if (!is_null($room->first())) {
            // return response()->json(['message' => 'You have already created a chat room with this user'], 409);
            // return redirect()->route('chat', ['sender_id' => $sender_id, 'receiver_id' => $receiver_id]);
        } else {
            // create new chat room and save it

            $chat_room = new ChatRoom();
            $chat_room->sender_id = $sender_id;
            $chat_room->receiver_id = $receiver_id;
            $chat_room->save();

            $data['sender'] = $sender_id;
            $data['receiver'] = $receiver_id;
            $data['roomId'] = $chat_room->id;

            // return response()->json($data, 201);
            // return redirect()->route('chat', ['sender_id' => $sender_id, 'receiver_id' => $receiver_id]);
        }
        return view('chat.chat_room');

    }


}
