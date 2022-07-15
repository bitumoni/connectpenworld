<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Providers\RouteServiceProvider;
use App\Models\Post;

use Illuminate\Foundation\Auth\RegPosts;

use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    use RegPosts;
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


   
    public function showpost()
    {
        return view('posts.sendpost');
    }



    public function post()
    {
        $posts = Post::join('users','users.id' , '=','posts.post_user_id' )->orderBy('posts.post_id','desc')->get();

       
         return view('posts.post',['posts'=>$posts]);
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
            'post_user_id' => ['required', 'string', 'max:255'],
            'post_content' => ['required', 'string', 'max:255'],
            'post_title' => ['required', 'string', 'max:255'],
            'post_category' => ['required', 'string', 'max:255'],
            'post_keywords' => ['required', 'string', 'max:255'],
            'post_language' => ['required', 'string', 'max:255'],
            'post_privacy' => ['required', 'string', 'max:255'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Post
     */
    protected function create(array $data)
    {
        return Post::create([
            'post_user_id' => $data['post_user_id'],
            'post_content' => $data['post_content'],
            'post_title' => $data['post_title'],
            'post_category' => $data['post_category'],
            'post_keywords' => $data['post_keywords'],
            'post_language' => $data['post_language'],
            'post_privacy' => $data['post_privacy'],
            
           
        ]);
    }
    //   function show()
    //  {
    //      $posts = Post::all();
    //      return view('home',['posts'=>$posts]);
    //  }
}