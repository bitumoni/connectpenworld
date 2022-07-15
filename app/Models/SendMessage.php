<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SendMessage extends Model
{
    public function messages() {
        return $this->belongsToMany(Message::class);
    }

    
    protected $fillable = [
       
        'send_user_id',
        'send_message_id',
        
            
    ];
    
}