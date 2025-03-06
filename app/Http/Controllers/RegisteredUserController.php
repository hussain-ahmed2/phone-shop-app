<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Email;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'firstname' => ['required', 'min:2'],
            'lastname' => ['required', 'min:2'],
            'email' => ['required', Email::default()],
            'password' => ['required', Password::min(6), 'confirmed']
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/');
    }
}
