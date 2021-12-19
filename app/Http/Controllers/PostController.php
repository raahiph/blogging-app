<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }
    
    public function create(){
        return view('posts.add-post');
    }
    
    public function create_post(Request $req){
       
        $file = $req->file('images');
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $req->title;
        $post->description = $req->description;
        if($file){
            $file_name = time().'.'.$file->getClientOriginalExtension();
            $post->image =  $file_name;
            Storage::putFileAs('public/uploads/images', $file, $file_name);
        }
        $post->save();
        return redirect('/home');
    }
    
    public function user_post_view(){
        $user_posts = Post::where('user_id', Auth::user()->id)->get();
        return view('posts.index',['posts' => $user_posts ]);
    }

    public function show($id, Request $request){
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function destroy($id, Request $request)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return redirect()->back();
        }
    }
}
