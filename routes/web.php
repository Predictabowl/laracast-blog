<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function(){
//     DB::listen(function($query){
//         logger($query->sql, $query->bindin);
//     });

    return view('posts', ["posts" => Post::latest()->with("category")->with("author")->get()]);
 });

Route::get('post/{post:slug}', 
    fn(Post $post) => view("post", ["post" => $post]));

Route::get("categories/{category:slug}", 
    fn(Category $category) => view("posts",["posts" => $category->posts]));

Route::get("authors/{author:username}",
    fn (User $author) => view("posts",["posts" => $author->posts]));
