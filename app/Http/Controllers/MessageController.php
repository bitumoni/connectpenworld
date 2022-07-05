<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }


   

    public function chat(Request $request,$id){

       $yo=Message::where('message_id','=', $id)->get('message_user_id');

      $yoyo= preg_replace('~\D~', '', $yo);



      $sender= Message::
      
      rightjoin("users",function($rjoin){
        $rjoin->on("users.id","=",'messages.message_user_id')
            ->on("users.id","=","messages.message_user_id");
      })
      
      ->orderBy('messages.message_id','asc')
      ->where(['messages.message_friend_id' => $yoyo,
      'messages.message_user_id' => Auth::id()])

      ->get();

      

       $receiver= Message::
      
       rightjoin("users",function($rjoin){
         $rjoin->on("users.id","=",'messages.message_user_id')
             ->on("users.id","=","messages.message_user_id");
       })
      
       ->orderBy('messages.message_id','asc')
       ->where(['messages.message_friend_id' => Auth::id(),
       'messages.message_user_id' => $yoyo])
       
       ->get();

    
     
        return view('message.chat',['receiver'=>$receiver,'sender'=>$sender,'sendid'=>$yoyo]);
       
     }


    public function msg(){

        $sendmsg = Message::rightjoin('users','users.id' , '=','messages.message_user_id' )->where('messages.message_friend_id','=',Auth::id())->orderBy('messages.created_at','desc')->get()->except(Auth::id());
       
        $data = Friend::Where('friend_user_id', Auth::id())->orderBy('friends.created_at','desc')->get('friend_request_id');
        $follow= User::whereNotIn('users.id',$data)->get()->except(Auth::id());
    
      //,['follow'=>$follow]

        return view('message.msg',['sendmsg'=>$sendmsg],['follow'=>$follow]);
    }

}
