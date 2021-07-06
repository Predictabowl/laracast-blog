<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        Auth::logout();
        return redirect()->route("homePage")->with("success","Arrivederci!");
    }

    public function create()
    {
        return view("session.create");
    }

    public function store()
    {
        // validate the request
        $attributes = request()->validate([
            "email" => ["required","email"], //,Rule::exists("users","email")
            "password" => ["required"]
        ]);

        // attempt to authenticate and log in the user
        if (Auth::attempt($attributes)){
            // redirect and flash a message
            session()->regenerate(); // This is to prevent a Session fixation attack
            return redirect()->route("homePage")->with("success","Bentornato!");
        }

        // auth failed - standard way
        // return back()
        //     ->withInput() // this will keep the fields
        //     ->withErrors(["email" => "Le credenziali fornite non sono valide."]);

        //auth fail alternative laravel way
        throw ValidationException::withMessages(["email" => "Le credenziali fornite non sono valide."]);

    }
}
