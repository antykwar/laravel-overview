<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required','max:255'],
            'username' => ['required','min:5','max:255',Rule::unique('users','username')],
            'email' => ['required','email', 'max:255',Rule::unique('users','email')],
            'password' => ['required', 'min:8']
        ]);

        User::create($attributes);

        return redirect('/')->with('success', 'You successfully registered! Welcome!');
    }
}
