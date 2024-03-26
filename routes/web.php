<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;

use App\Http\Middleware\CheckUser1;



Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::post('/{user1_id}/{user2_id}', [ConversationController::class, 'create'])->name('create_ConversationController')->middleware('CheckUser1');
    Route::get("/chat/{conversation_id}",[MessageController::class, 'show'])->name('show_ConversationController');
    Route::get('/search',[ConversationController::class, "searchUser"])->name("search");




    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
    Route::put('/profil/{user_id}', [ProfileController::class, 'update'])->name('update_profil');




});


