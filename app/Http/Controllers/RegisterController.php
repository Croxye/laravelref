<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function store()
    {
        // create the user
        $attributes = request()->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::create($attributes);

        // log the user in
        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created!');
    }

    public function create()
    {
        return view('register.create');
    }
}
