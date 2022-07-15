<?php

use App\Models\Chat;
use App\Models\Post;
use App\Models\Friend;
use App\Models\Message;
use App\Models\SendMessage;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\MessageController;

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

Auth::routes();
//start socket
/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('conversation/{userId}',[App\Http\Controllers\MessageController::class, 'conversation'])
    ->name('message.conversation');
Route::post('send-message', [App\Http\Controllers\MessageController::class, 'sendMessage'])
    ->name('message.send-message');

Route::post('send-group-message', [App\Http\Controllers\MessageController::class, 'sendGroupMessage'])
    ->name('message.send-group-message');

Route::resource('message-groups', 'MessageGroupController');
*/

//end socket


// Route::controller(HomeController::class)->group(function () {
//     Route::get('home', 'home')->name('home');
//     Route::get('/home', function () {
//         return view('home');
//     });
   
//  // Route::get('home', 'index')->name('home');

// });

Route::controller(PostController::class)->group(function () {

    Route::get('/home', 'showpost');
   // Route::get('/home', 'sendpost');
  //  Route::get('/home', 'index');
  //  Route::get('/home', 'sendpost')->name('sendpost');
   // Route::get('home', 'post');
    Route::get('home', 'post')->name('post');
   // Route::get('welcome', 'news');

});
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
    
    return redirect('home')->with('message', 'Post request sent successfully!');
});



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('post');



//Route::get('posts', [PostController::class, 'post'])->name('post');



Route::controller(FriendController::class)->group(function () {
  
    // Route::get('/user/profile', 'index');
    // Route::get('/user/{id}', 'show');
    // Route::post('/user/profile', 'post');
    // Route::get('/signup', 'signup');
    // Route::post('/users', 'store');
    // Route::get('/reg', 'reg');
    // Route::get('/login', 'login');
    // Route::get('/demo', 'demo');
    // Route::get('/test', 'test');
    // Route::get('/msg', 'msg');
    //Route::get('/menu', 'menu');
  //  Route::get('/friends', 'friends');
  // Route::get('friends', 'post')->name('friends');

 

    Route::get('friends', [App\Http\Controllers\FriendController::class, 'friends'])->name('friends.allfriends');
    Route::post('friends/follow/{name}', [App\Http\Controllers\FriendController::class, 'post'])->name('friends.follow');
    
   // Route::post('friends/{name}','post');
 
    Route::post('friends/unfollow/{id}', [App\Http\Controllers\FriendController::class, 'unfollow'])->name('friends.unfollow');

    // Route::post('/friends',function(){

    //     $follow =new Friend();
    //     $follow->friend_user_id=request('friend_user_id');
    //     $follow->friend_request_id=request('friend_request_id');
    //     $follow->friend_status=request('friend_status');
    //     $follow->save();
        
    //     return redirect('friends')->with('follow',' Started Following');
    // });

  //  Route::post('friends.allfriends', 'FriendController@crteate')->name('friends.allfriends');
 //  Route::get('friends', [App\Http\Controllers\FriendController::class, 'create'])->name('friends.allfriends');

});

Route::controller(MessageController::class)->group(function () {

  
  
   // Route::view('/msg/chat', 'chat');
   Route::get('/msg/chat/sms', [App\Http\Controllers\MessageController::class, 'sms'])->name('sms');
    Route::get('/msg/chat/{id}', [App\Http\Controllers\MessageController::class, 'chat'])->name('message.select');

    Route::get('/msg', [App\Http\Controllers\MessageController::class, 'msg'])->name('message.msg');

    Route::post('/msg',function(){

        $msg =new Message();
       // $msg->message_user_id=request('message_user_id');
        $msg->message_friend_id=request('message_friend_id');
        $msg->message_chat=request('message_chat');
        $msg->message_status=request('message_status');
        $msg->save();

        
        $msgdata1 = Message::latest()->pluck('message_id')->first();
        $msgid=(string)$msgdata1;
        
        
      
        $sendmsg =new SendMessage();
        $sendmsg->send_user_id=request('send_user_id');
        $sendmsg->send_message_id=$msgid;
        $sendmsg->save();

        $msgdata2 = Message::latest()->pluck('message_id')->first();
        $chatmsgid=(string)$msgdata2;

        $msgdata3 = Message::latest()->pluck('message_friend_id')->first();
        $friendid=(string)$msgdata3;
       

        $msgdata4 = SendMessage::latest()->pluck('send_user_id')->first();
        $userid=(string)$msgdata4;

        $msgdata5 = Message::latest()->pluck('message_chat')->first();
        $msgchat=(string)$msgdata5;

        $msgdata6=User::where('users.id','=',$friendid)->pluck('name')->first();
        $chatname=(string)$msgdata6;


        $chat =new Chat();
       
        $chat->chat_message_id=$chatmsgid;
        $chat->chat_user_id=$userid;
        $chat->chat_friend_id=$friendid;
        $chat->chat_name=$chatname;
        $chat->chat_message=$msgchat;
        $chat->chat_status=request('message_status');
        $chat->save();


        $msgdatax = Chat::latest()->pluck('chat_friend_id')->first();
        $msgfrndid=(string)$msgdatax;

        //return redirect('/msg/chat/{id}')->action(
         //   [App\Http\Controllers\MessageController::class, 'chat'], ['id' => $msgfrndid]
       // )->name('message.select');
       // return redirect()->Route('/msg/chat/{id}', [App\Http\Controllers\MessageController::class, 'chat'])->name('message.select');
        return Redirect(route('message.select',['id'=>$msgfrndid]))->with('follow', 'Message Sent Successfully!');
    });

    


});

Route::controller(UserController::class)->group(function () {
  
    Route::get('/profile', 'userprofile');

});

