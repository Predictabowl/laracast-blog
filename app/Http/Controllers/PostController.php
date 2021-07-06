<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showAll()
    {
        /* lazy loading here will result in additional queries for every post
        because the relationships are needed.
        Use clockwork or listen to the DB to see the number of queries
      */

//     DB::listen(function($query){
//         logger($query->sql, $query->bindin);
//     });

        //with and get are used for eager loading references
        $post = Post::latest()->with(["category","author"])
            ->filter(request(["search","category","author"]))->paginate(6)->withQueryString(); 

        return view('posts.showAll', [
            "posts" => $post
        ]);
    }

    public function show(Post $post)
    {
        return view("posts.show", ["post" => $post]);
    }
}
