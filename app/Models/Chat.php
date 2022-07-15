<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'chat_message_id',
        'chat_user_id',
        'chat_friend_id',
        'chat_name',
        'chat_message',
        'chat_status',
        
            
    ];
   
}
