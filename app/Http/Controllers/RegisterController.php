<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            //"username" => ["required","max:255","min:3","unique:users,username"], //alternative
            "username" => ["required","max:255","min:3",Rule::unique("users","username")],
            "email" => ["required","email", "max:255", Rule::unique("users","email")],
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

        //session()->flash("success","Il tuo account è stato creato."); // inline below

        return redirect()->route("homePage")->with("success","Il tuo account è stato creato.");
    }
}
