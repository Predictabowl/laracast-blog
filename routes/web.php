<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});

Route::get('post/{post}', function ($post) {
    $path = __DIR__ . "/../resources/posts/{$post}.html";
    if (!file_exists($path)) {
        ddd("file does not exists: ".$path); // dd stands for die and dump into the page useful for debug
//        abort(404);
//        return redirect("/");
    }

    $postFile = file_get_contents($path);
    return view('post', [
    'post' => $postFile
    ]);
})->where("post", "[A-z_\-]+");
