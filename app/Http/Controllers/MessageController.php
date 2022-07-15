<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use App\Models\Friend;
use App\Models\Message;
use App\Models\SendMessage;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sms()
    {

      return view('message.sms');

    }


   

    public function chat(Request $request,$id){

      //  $yo=Message::where('message_id','=', $id)->get('message_user_id');

      // $yoyo= preg_replace('~\D~', '', $yo);
      $yoyo=$id;
      $myid=Auth::id();

      $msgdata = Message::latest()->pluck('message_id')->first();
       



      // $sender= Message::
      
      // rightjoin("users",function($rjoin){
      //   $rjoin->on("users.id","=",'messages.message_friend_id')
      //       ->on("users.id","=","messages.message_friend_id");
      // })
      
      // ->orderBy('messages.message_id','asc')
      // ->where(['messages.message_friend_id' => $yoyo,
      // 'messages.message_user_id' => Auth::id()])

      // ->get();

      

      

      // $receiver= Message::
      
      //   rightjoin("users",function($rjoin){
      //     $rjoin->on("users.id","=",'messages.message_user_id')
      //         ->on("users.id","=","messages.message_user_id");
      //   })
      
      //   ->orderBy('messages.message_id','asc')
      //   ->where(['messages.message_friend_id' => Auth::id(),
      //   'messages.message_user_id' => $yoyo])
       
      //   ->get(); 

       
       //join('users', 'users.id', '=', 'messages.message_friend_id')
        //->join('send_messages', 'messages.message_id', '=', 'send_messages.send_message_id')
        
         
      // 'messages.message_friend_id' => Auth::id()])
        //  rightjoin("messages",function($rjoin){
        //    $rjoin->on("users.id","=",'messages.message_user_id')
        //        ->on("users.id","=","messages.message_user_id");
        //  }) 

        //   ->join("send_messages",function($ljoin){
        //    $ljoin->on("messages.message_user_id","=",'send_messages.message_user_id')
        //        ->on("messages.message_user_id","=","send_messages.message_user_id");
        //  })

        //  leftjoin("send_messages",function($ljoin){
        //    $ljoin->on("messages.message_id","=",'send_messages.send_message_id')
        //        ->on("messages.message_id","=","send_messages.send_message_id");
        //  })
        
        // rightjoin("messages",function($rjoin){
        //   $rjoin->on("messages.message_user_id","=",'send_messages.send_user_id')
        //       ->on("messages.message_id","=","send_messages.send_message_id");
        // })

       // ->orderBy('messages.message_id','asc')
        //->where(['messages.message_friend_id' => $yoyo,'send_messages.send_user_id'=>Auth::id()])
       
        // $receiver= User::
        // join('messages', 'messages.message_friend_id', '=', 'users.id')
        
        // ->where('messages.message_friend_id', '=', $yoyo)
        
        //  ->join('send_messages', 'messages.message_id', '=', 'send_messages.send_message_id')
        //  ->where('send_messages.send_user_id','=', Auth::id()) 
        
       
      
     // dd($receiver);

    //demo try start
  //   $receiver= Message::
      
  //   rightjoin("users",function($rjoin){
  //     $rjoin->on("users.id","=",'messages.message_user_id')
  //         ->on("users.id","=","messages.message_user_id");
  //   })

   
   
   
  //   ->orderBy('messages.message_id','asc')
  //   ->where(['messages.message_friend_id' => Auth::id(),
  //   'messages.message_user_id' => $yoyo])
    
  //  ->get(); 
   //demotry end
     //$receiver= Message::
    // $xyz = Message::Where('send_user_id', Auth::id())->latest()->pluck('send_message_id');
     //->orderBy('send_messages.created_at','desc')

     
   //  $receiver=User::
   //   Message::where(['message_friend_id'=>$yoyo])->get();
     //->except(Auth::id());
    // dd($receiver);
       //rightjoin("send_messages",function($rjoin){
       //  $rjoin->on("messages.message_id","=",'send_messages.send_message_id')
       //      ->on("messages.message_id","=","send_messages.send_message_id");
      // })
      
     //  ->orderBy('send_messages.send_message_id','asc')
       // ->where(['messages.message_friend_id' => $yoyo,
       // 'send_messages.send_user_id' => Auth::id()])

      // ->get();

       // join("messages",function($rjoin){
      //  $rjoin->on("messages.message_id","=",'send_messages.send_message_id')
      //    ->on("messages.message_id","=",'send_messages.send_message_id');
      //  })
      //  ->wherenot('send_messages.send_user_id','=' ,Auth::id())
      // ->wherenot('messages.message_friend_id','!=' ,$yoyo)
     // ->orderBy('send_messages.created_at','desc')
      
      //->wherenot('send_user_id', '=', Auth::id())
     // ->get();
      //->except(Auth::id());
      //$receiver = Arr::flatten($receiverr);
      //ghjnvfgbnjv
        //  $receiver= User::
      
        //  rightjoin("messages",function($rjoin){
        //   $rjoin->on("users.id","=",'messages.message_friend_id')
        //        ->on("users.id","=","messages.message_friend_id");
        //  })
        //  ->rightjoin("send_messages",function($rjoin){
        //   $rjoin->on("messages.message_id","=",'send_messages.send_message_id')
        //        ->on("messages.message_id","=","send_messages.send_message_id");
        //  })
        //  ->where(['send_user_id'=>Auth::id(),'message_friend_id'=>$yoyo])
        //  ->orderBy('messages.message_id','asc')
        
       
        //  ->get();
/*
         $senderr= Message::
        rightjoin("send_messages",function($rjoin){
          $rjoin->on("messages.message_id","=",'send_messages.send_message_id')
               ->on("messages.message_id","=","send_messages.send_message_id");
         })
      
         -> rightjoin("users",function($rjoin){
          $rjoin->on("users.id","=",'send_messages.send_user_id')
               ->on("users.id","=","send_messages.send_user_id");
         })
         
         ->where(['send_user_id'=>Auth::id(),'message_friend_id'=>$yoyo])
         //->orderBy('messages.message_id','asc')
        
       
         ->get();

       */  
      /*
         $receiver= Message::
        rightjoin("send_messages",function($rjoin){
          $rjoin->on("messages.message_id","=",'send_messages.send_message_id')
               ->on("messages.message_id","=","send_messages.send_message_id");
         })

         -> rightjoin("users",function($rjoin){
          $rjoin->on("users.id","=",'send_messages.send_user_id')
               ->on("users.id","=","send_messages.send_user_id");
         })

         
         
         ->where(['send_user_id'=>$yoyo,'send_user_id'=>Auth::id()])
         //->orderBy('send_messages.send_message_id','asc')
        
         ->get();
          // $receiver = Arr::flatten([$receiverr,$senderr]);
*/   
/*     
$sender= User::
// rightjoin("chats",function($rjoin){
//   $rjoin->on("messages.message_id","=",'chats.chat_message_id')
//        ->on("messages.message_id","=","chats.chat_message_id");
//  })

   rightjoin("chats",function($rjoin){
   $rjoin->on("users.id","=",'chats.chat_user_id')
        ->on("users.id","=","chats.chat_user_id");
 })



 //-> rightjoin("users",function($rjoin){
 // $rjoin->on("users.id","=",'chats.chat_user_id')
 //      ->on("users.id","=","chats.chat_user_id");
// })

 


 ->where(['chat_friend_id'=>$yoyo,'chat_user_id'=>Auth::id()])
 
//  ->where(['chat_user_id'=>$yoyo])
// ->where(['send_user_id'=>Auth::id()])
 //->orderBy('send_messages.send_message_id','asc')

 ->get();
 */

          $receiver= User::
          // rightjoin("chats",function($rjoin){
          //   $rjoin->on("messages.message_id","=",'chats.chat_message_id')
          //        ->on("messages.message_id","=","chats.chat_message_id");
          //  })

             rightjoin("chats",function($rjoin){
             $rjoin->on("users.id","=",'chats.chat_user_id')
                  ->on("users.id","=","chats.chat_user_id");
           })

          //  ->rightjoin("send_messages",function($rjoin){
          //   $rjoin->on("users.id","=",'chats.send_user_id')
          //        ->on("users.id","=","chats.chat_user_id");
          // })
           
          // ->where(['chat_user_id'=>auth::id(),'chat_user_id'=>$yoyo])
           
          //->where(['chat_friend_id'=>$yoyo])


           //-> rightjoin("users",function($rjoin){
           // $rjoin->on("users.id","=",'chats.chat_user_id')
           //      ->on("users.id","=","chats.chat_user_id");
          // })

           ->where(function($mmm)use($yoyo,$myid){
            $mmm->where('chat_user_id',$myid)->where('chat_friend_id',$yoyo);
           })->orwhere(function($mmm)use($yoyo,$myid){
            $mmm->where('chat_user_id',$yoyo)->where('chat_friend_id',$myid);
           })
  
  
          
           
         //  ->where(['chat_user_id'=>$yoyo])
           //->where(['chat_user_id'=>Auth::id(),'chat_user_id'=>Auth::id()])
           ->orderBy('chats.chat_message_id','asc')
          
          //  ->get()
          ->get();

          // $receiver=array_merge([$sender,$receiverr]);
  
     return view('message.chat',[ 'receiver'=>$receiver,'sendid'=>$yoyo]);
  // return view('message.chat',[ 'receiver'=>$receiver,'sendid'=>$yoyo]);
     
        // return view('message.chat',['receiver'=>$receiver,'sender'=>$sender,'sendid'=>$yoyo]);
       
     }


    public function msg(){

        $sendmsg = Message::
         leftjoin("users",function($rjoin){
         $rjoin->on("users.id","=",'messages.message_friend_id')
             ->on("users.id","=","messages.message_friend_id");
       })

       ->leftjoin("send_messages",function($rjoin){
        $rjoin->on("send_messages.send_message_id","=",'messages.message_id')
            ->on("send_messages.send_message_id","=","messages.message_id");
      })

       ->Where('send_user_id','=', Auth::id())
       ->orderBy('send_messages.created_at','desc')
       ->get()->except(Auth::id());
       //->except(Auth::id());
        
        
        //Where('send_user_id','=', Auth::id())->orderBy('send_messages.created_at','desc')->get()->except(Auth::id());
       
        $data = Friend::Where('friend_user_id', Auth::id())->orderBy('friends.created_at','desc')->get('friend_request_id');
        $follow= User::whereNotIn('users.id',$data)->get()->except(Auth::id());
    
      //,['follow'=>$follow]
      return view('message.msg',['sendmsg'=>$sendmsg]);
       // return view('message.msg',['sendmsg'=>$sendmsg],['follow'=>$follow]);
    }

    

}
