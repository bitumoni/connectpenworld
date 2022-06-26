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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->unsignedBigInteger('post_user_id');
            $table->foreign('post_user_id')->references('id')->on('users');
            
            $table->string('post_content');
            $table->string('post_title');
            $table->string('post_category');
            $table->string('post_keywords');
            $table->string('post_language');
            $table->string('post_privacy');
            $table->timestamps();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
