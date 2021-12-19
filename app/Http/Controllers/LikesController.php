<?php

namespace App\Http\Controllers;

use App\Models\like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function store($id){
        $check = like::where('user_id', Auth::user()->id)->where('post_id', $id)->first();
        if($check){
            $check->delete();
            return redirect()->back();
        }
        $like = new like();
        $like->post_id = $id;
        $like->user_id = Auth::user()->id;
        $like->count = 1;
        $like->save();
        return redirect()->back();
    }

    
        
}
