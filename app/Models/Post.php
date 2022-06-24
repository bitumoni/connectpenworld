<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\user as Authenticatable;


class Post extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'post_user_id',
        'post_content',
        'post_title',
        'post_category',
        'post_keywords',
        'post_language',
        'post_privacy',
            
    ];

    protected $casts = [
       
        'status' => 'string',

    ];
}
