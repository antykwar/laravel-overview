<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome Back!');
        }

        throw ValidationException::withMessages([
            'email' => 'Your credentials could not be verified.'
        ]);
//        return back()
//            ->withInput()
//            ->withErrors(['email' => 'Your credentials could not be verified.']);
    }

    public function destroy()
    {
        Auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
