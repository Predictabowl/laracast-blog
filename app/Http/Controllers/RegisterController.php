<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view("register.create");
    }

    public function store()
    {
        $attributes = request()->validate([
            "name" => ["required","max:255"], 
            "username" => "required|max:255|min:3",//alternative way with pipes instead of arrays
            "email" => ["required","email", "max:255"],
            "password" => ["required", "min:7"]
        ]);
        /*
            If the validate fails it will automatically redirect back to the previous page
            and any code below this will be ignored
        */
        //dd("validation succeeded");
        //$attributes["password"] = bcrypt($attributes["password"]); // we use a Mutator in User.php instead
        User::create($attributes);
        //return redirect("/");
        return redirect()->route("homePage");
    }
}
