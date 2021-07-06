<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {

        request()->validate([
            "body" => "required",
        ]);

        // Calling from $post will set automatically its id
        // Otherwise is the same as Comment::create
        $post->comments()->create([
            "user_id" => auth()->user()->id, //request()->user()->id,
            "body" => request("body")
        ]);

        return back();
    }

    /**
     * Alternative version that uses dependency injection
     * in this case request is injected
    */
    /*
    public function store(Post $post, Request $request)
    {
        $post->comments()->create([
            "user_id" => $request->user()->id,
            "body" => $request->input("body")
        ]);
    }*/
}
