<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function show($id)
    {
        $comment = Comment::findorfail($id);
        return view('comments.show', compact('comment'));
    }

    public function store($id, Request $request)
    {
        $comment = new Comment();
        $comment->post_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->body = $request->comment_body;
        $comment->reply_id = 0;
        $comment->save();
        return redirect()->back();
    }

    public function add_reply($id, Request $request)
    {
        $reply = new Comment();
        $reply->user_id = Auth::user()->id;
        $reply->post_id = $request->post_id;
        $reply->body = $request->reply_body;
        $reply->reply_id = $id;
        $reply->save();
        return redirect('/comment' . '/' . $id);
    }
    public function destroy($id, Request $request)
    {
        $comment = Comment::find($id);
        if ($comment) {
            $comment->delete();
            return redirect()->back();
        }
    }

}
