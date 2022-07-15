<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{


    public function sendmessages() {
        return $this->belongsToMany(SendMessage::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
        //, 'user_messages','message_id', 'sender_id'
           // ->withTimestamps();
    }

/*
    
    use HasFactory;
     */

    protected $fillable = [
       
        //'message_user_id',
        'message_friend_id',
        'message_chat',
        'friend_status',
        
            
    ];
   

}
