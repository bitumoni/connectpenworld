<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('post');

Route::post('/home',function(){

    $post=new Post();
    $post->post_user_id=request('post_user_id');
    $post->post_content=request('post_content');
    $post->post_title=request('post_title');
    $post->post_category=request('post_category');
    $post->post_keywords=request('post_keywords');
    $post->post_language=request('post_language');
    $post->post_privacy=request('post_privacy');
    $post->save();
    
    return view('home');
});
