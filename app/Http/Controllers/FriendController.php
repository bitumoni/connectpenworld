<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
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

        Friend::where('friend_id', $id)->delete();

        return redirect('friends')->with('follow', 'Unfollow sent successfully!');

     }


    public function friends(){
       
        $following = Friend::rightjoin('users','users.id' , '=','friends.friend_request_id' )->where('friends.friend_user_id','=',Auth::id())->get()->except(Auth::id());
       
        $data = Friend::Where('friend_user_id', Auth::id())->get('friend_request_id');
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

   // $update = Friend::where('friend_user_id', auth::id()) ->limit(1) ->update( [ 'name' => $data['name'], 'address' => $data['address'], 'email' => $data['email'], 'contactno' => $data['contactno'] ]); 
  
}
