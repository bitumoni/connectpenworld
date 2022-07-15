<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id('chat_id');
            
            $table->unsignedBigInteger('chat_message_id');
            $table->foreign('chat_message_id')->references('message_id')->on('messages')->onDelete('cascade');
            
            $table->unsignedBigInteger('chat_user_id');
            $table->foreign('chat_user_id')->references('send_user_id')->on('send_messages')->onDelete('cascade');

            $table->unsignedBigInteger('chat_friend_id');
            $table->foreign('chat_friend_id')->references('message_friend_id')->on('messages')->onDelete('cascade');
            
            $table->string('chat_name');
            $table->string('chat_message');
            $table->string('chat_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
};
