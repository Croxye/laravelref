<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
