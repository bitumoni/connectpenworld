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
        Schema::create('send_messages', function (Blueprint $table) {
            $table->id('send_id');
            $table->unsignedBigInteger('send_user_id');
            $table->foreign('send_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('send_message_id');
            $table->foreign('send_message_id')->references('message_id')->on('messages')->onDelete('cascade');
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
        Schema::dropIfExists('send_messages');
    }
};
