<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'message_user_id',
        'message_friend_id',
        'message_chat',
        'friend_status',
        
            
    ];

}
