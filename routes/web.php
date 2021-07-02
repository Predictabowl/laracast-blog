<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;

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

Route::get('/',
    fn () => view('posts', ["posts" => Post::all()]));

Route::get('post/{post:slug}', 
    fn(Post $post) => view("post", ["post" => $post]));

Route::get("categories/{category:slug}", 
    fn(Category $category) => view("posts",["posts" => $category->posts]));
