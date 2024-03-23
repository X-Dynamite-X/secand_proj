<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatRoomController;
use App\Http\Controllers\ProfileController;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/chat/{room_id}', [ChatRoomController::class, 'show'])->name('chat');
//
    Route::get('/chat/{sender_id}/{receiver_id}', [ChatRoomController::class, 'searchUser'])->name('searchUser');
    // // Route::get('/chat/{sender_id}/{receiver_id}', [ChatRoomController::class, 'show'])->name('chat');


    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
    Route::put('/profil/{user_id}', [ProfileController::class, 'update'])->name('update_profil');
    Route::get('/chat/{sender_id}/{receiver_id}', [ChatRoomController::class, 'createChatRoom']);
    Route::get('/chat/{chat_room_id}', [ChatRoomController::class, 'getChatMessages']);



});


