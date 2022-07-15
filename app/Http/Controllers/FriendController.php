<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\FriendRequests;

class FriendController extends Controller
{

    use FriendRequests;

         /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function unfollow(Request $request,$id){

        $unff = Friend::rightjoin('users','users.id' , '=','friends.friend_request_id' )->where('friends.friend_id','=',$id)->orderBy('friends.created_at','desc')->get('name')->except(Auth::id());

        $uf1=$unff;
        $a=substr($uf1, 9, 15);
        $b=str_replace('"', '', $a);
        $b=str_replace('}', '', $b);
        $c=str_replace(']', '', $b);
        

        $uf2="You started unfollowing";
        
        $uf="$uf2 $c";
       


        Friend::where('friend_id', $id)->delete();

        return redirect('friends')->with('follow', $uf);

     }

   public function post(Request $request,$name){

        $follow =new Friend();
        $follow->friend_user_id=request('friend_user_id');
        $follow->friend_request_id=request('friend_request_id');
        $follow->friend_status=request('friend_status');
        $follow->save();


        $ff1=$name;
        $ff2="You started following";
        
        $ff="$ff2 $ff1";
        
        
        return redirect('friends')->with('follow',$ff);
    }


    public function friends(){
    
        $following = Friend::rightjoin('users','users.id' , '=','friends.friend_request_id' )->where('friends.friend_user_id','=',Auth::id())->orderBy('friends.created_at','desc')->get()->except(Auth::id());
       
        $data = Friend::Where('friend_user_id', Auth::id())->orderBy('friends.created_at','desc')->get('friend_request_id');
        $follow= User::whereNotIn('users.id',$data)->get()->except(Auth::id());
    


        // $follow= User::join('friends', 'users.id', '=', 'friends.friend_request_id')
        // ->where('friends.friend_user_id','=',Auth::id())->get()->except(Auth::id());


        //$follow= User::leftjoin('friends', 'users.id', '=', 'friends.friend_user_id')
       // ->whereNull('friends.friend_request_id')->get();
        
     //   $follow = User::with('friends')->where('friend_status', '=', 'Following')->get();

    //    $follow = User::leftjoin('friends','friends.friend_user_id' , '=','users.id' )->where('users.id','=',["$name"])->orderBy('users.id','desc')->get()->except(Auth::id());
       
   //  $follow =  User::leftjoin('friends','users.id' , '=','friends.friend_request_id' )->where('friends.friend_status','=','Following')->orderBy('users.id','desc')->get()->except(Auth::id());
       // $follow =  User::orderBy('users.id','desc')->get()->except('Auth::id()');
        //$follow = Friend::rightjoin('users','users.id' , '=','friends.friend_request_id' )->where('friends.friend_user_id','=',Auth::id())->orderBy('users.id','desc')->get()->except(Auth::id());
        //$follow =  User::orderBy('users.id','desc')->get()->except(Auth::id());

        //$follow = User::orderBy('users.id','desc')->get()->except(Auth::id());
       
      //  $users = User::orderBy('users.id','desc')->get()->except(Auth::id());
      // $users = Friend::join('users','users.id' , '=','friends.friend_request_id' )->where([['friend_status', '=', 'Following'],])->orderBy('users.id','desc')->get()->except(Auth::id());
        //$users = User::join('friends','friends.friend_user_id' , '=','users.id' )->where([['friend_status', '=', 'Following']])->orderBy('users.id','desc')->get()->except(Auth::id());

      // $users = Friend::join('users','users.id' , '=','friends.friend_user_id' )->orderBy('users.id','desc')->get()->except(Auth::id());


       // $users = Friend::orderBy('friends.friend_id','desc')->where([['friends.friend_status', '=', 'following'],])->get()->except(Auth::id());;
       // $posts = Post::join('users','users.id' , '=','posts.post_user_id' )->orderBy('posts.post_id','desc')->get();
       // $users= User::all()->except(Auth::id());
      // $users= User::orderBy('users.id','desc')->where('friends.friend_status', "following")->get()->except(Auth::id());

        // $users = User::join('friends', 'friends.friend_user_id', '=', 'users.id')
        //     ->where('friends.friend_status', 'Following')
        //      ->get()->except(Auth::id());

   // $users = Friend::join('users', 'users.id', '=', 'friends.friend_user_id')->where('friends.friend_status', 'following')
        //    ->orderBy('users.id','desc')
     //       ->get()->except(Auth::id());

     //$users = Friend::join('users','users.id' , '=','friends.friend_user_id' )->orderBy('users.id','desc')->get()->except(Auth::id());

    //  $following = User::join('friends', 'friends.friend_user_id', '=', 'users.id')
    //         ->where('friends.friend_status','')
    //         ->get(['users.*'])->except(Auth::id());

        
        return view('friends.allfriends',['following'=>$following],['follow'=>$follow]);
    }


 

            /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'friend_user_id' => ['required', 'string', 'max:255'],
            'friend_request_id' => ['required', 'string', 'max:255'],
            'friend_status' => ['required', 'string', 'max:255'],
            
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Friend
     */
    protected function create(array $data)
    {
        return Friend::create([
            'friend_user_id' => $data['friend_user_id'],
            'friend_request_id' => $data['friend_request_id'],
            'friend_status' => $data['friend_status'],
            
            
           
        ]);
    }

 /*   public function sendmsg(Request $request,$id){

       // $yo=Message::where('message_id','=', $id)->get('message_user_id');
 
     //  $yoyo= preg_replace('~\D~', '', $yo);
 
        
 
       $sender= Message::
       
       rightjoin("users",function($rjoin){
         $rjoin->on("users.id","=",'messages.message_user_id')
             ->on("users.id","=","messages.message_user_id");
       })
       
       ->orderBy('messages.message_id','asc')
       ->where(['messages.message_friend_id' => $id,
       'messages.message_user_id' => Auth::id()])
 
       ->get();
 
       
 
        $receiver= Message::
       
        rightjoin("users",function($rjoin){
          $rjoin->on("users.id","=",'messages.message_user_id')
              ->on("users.id","=","messages.message_user_id");
        })
       
        ->orderBy('messages.message_id','asc')
        ->where(['messages.message_friend_id' => Auth::id(),
        'messages.message_user_id' => $id])
        
        ->get();
 
     
      
         return view('message.chat',['receiver'=>$receiver,'sender'=>$sender,'sendid'=>$id]);
        
      } */

   // $update = Friend::where('friend_user_id', auth::id()) ->limit(1) ->update( [ 'name' => $data['name'], 'address' => $data['address'], 'email' => $data['email'], 'contactno' => $data['contactno'] ]); 
  
}
