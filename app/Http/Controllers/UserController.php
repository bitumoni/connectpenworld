<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function userprofile(){

        $following = Friend::rightjoin('users','users.id' , '=','friends.friend_request_id' )->where('friends.friend_user_id','=',Auth::id())->orderBy('friends.created_at','desc')->count('name');
        $follow = Friend::rightjoin('users','users.id' , '=','friends.friend_request_id' )->where('friends.friend_request_id','=',Auth::id())->orderBy('friends.created_at','desc')->count('name');
        $post= Post::where('post_user_id','=', Auth::id())->count();
        $username=User::where('id', Auth::id())->first()->name;
        $userrole=User::where('id', Auth::id())->first()->role;
        $usergender=User::where('id', Auth::id())->first()->gender;
        $userdob=User::where('id', Auth::id())->first()->dob;
        $cd=Carbon::now()->format('Y-m-d');
        $a=substr($userdob, 0, 4);
        $b=substr($cd, 0, 4);
        $userage= $b - $a;
        

        $userpost = Post::join('users','users.id' , '=','posts.post_user_id' )->where('posts.post_user_id','=',Auth::id())->orderBy('posts.post_id','desc')->get();
       
      // $data = Friend::select('friend_request_id','=', Auth::id())->orderBy('friends.created_at','desc')->get('friend_request_id');
      //  $follow= User::where('users.id',$data)->count('name');
       // $follow= $followers - 1;


      

        return view('users.profile',['following'=>$following,'follow'=>$follow,'post'=>$post,'username'=>$username,'userrole'=>$userrole,'usergender'=>$usergender,'userage'=>$userage,'userpost'=>$userpost]);

    }
}
