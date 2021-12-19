<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
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
    public function index()
    {
        $user_posts = Post::where('user_id', Auth::user()->id)->get();
        return view('home',['posts' => $user_posts ]);
       // return view('home');
    }
    
    public function edit_user_post($id)
    {
        $post = Post::find($id);
        return view('posts.edit-post', ['post' => $post]);
    }
    
    public function update_user_post( Request $req, $id)
    {  
        $post = Post::find($id);
        if( $req->images){
            $file = $req->file('images');
            $file_name = time().'.'.$file->getClientOriginalExtension();
            Storage::delete('public/uploads/images/'.$post->image);
            Storage::putFileAs('public/uploads/images', $file, $file_name);
            $post->image = $file_name;
        }
        $post->title = $req->title;
        $post->description = $req->description;
        $post->save();
        return redirect('/home');
        
        
    }
    
    
    
}
