<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostCommentsController;
use Illuminate\Support\Facades\Route;
//use App\Models\Post;
//use App\Models\Category;
//use App\Models\User;

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

  //RESTFUL actions (7): index. show, create, store, edit, update, destroy

  Route::get('/', [PostController::class,"showAll"])->name("homePage");

  Route::get('post/{post:slug}', [PostController::class,"show"]);

  Route::post('post/{post:slug}/comments', [PostCommentsController::class,"store"]);

  Route::get("register",[RegisterController::class,"create"])->middleware("guest");

  Route::post("register",[RegisterController::class,"store"])->middleware("guest");

  Route::get("login",[SessionController::class,"create"])->middleware("guest");

  Route::post("login",[SessionController::class,"store"])->middleware("guest");  

  Route::post("logout",[SessionController::class,"destroy"])->middleware("auth");


/*  Route::get(
      "categories/{category:slug}",
      fn (Category $category) => view("posts", [
        "posts" => $category->posts->load(["category","author"]), // the function load is used for eager loading of DB references
        "currentCategory" => $category,
        "categories" => Category::all()
    ])
  )->name("categoryRoute");*/

/*  Route::get(
      "authors/{author:username}",
      fn (User $author) => view("posts.showAll", [
        "posts" => $author->posts->load(["category","author"])
    ])
  );*/
