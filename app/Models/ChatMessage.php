<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;


    protected $fillable = ['chat_room_id', 'message'];

    public function room()
    {
        return $this->belongsTo(ChatRoom::class, 'chat_room_id');
    }
    
}
