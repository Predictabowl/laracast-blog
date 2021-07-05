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

  Route::get('/', function () {
      /* lazy loading here will result in additional queries for every post
        because the relationships are needed.
        Use clockwork or listen to the DB to see the number of queries
      */

//     DB::listen(function($query){
//         logger($query->sql, $query->bindin);
//     });

      $post = Post::latest()->with(["category","author"]); //with and get are used for eager loading references

      if (request("search")) {
          /* This is a standard SQL query, equivalent to
            |select * from posts
            |where title like "%request("search")%";
            remember the % are wildcards
          */
          $post->where("title", "like", "%".request("search")."%")
          ->orWhere("body", "like", "%".request("search")."%");
      }

      return view('posts', [
      "posts" => $post->get(),
      "categories" => Category::all()]);
  })->name("homePage");

  Route::get(
      'post/{post:slug}',
      fn (Post $post) => view("post", ["post" => $post])
  );

  Route::get(
      "categories/{category:slug}",
      fn (Category $category) => view("posts", [
        "posts" => $category->posts->load(["category","author"]), // the function load is used for eager loading of DB references
        "currentCategory" => $category,
        "categories" => Category::all()
    ])
  )->name("categoryRoute");

  Route::get(
      "authors/{author:username}",
      fn (User $author) => view("posts", [
        "posts" => $author->posts->load(["category","author"]),
        "categories" => Category::all()
    ])
  );
