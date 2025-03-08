<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Email;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() 
    {
        return view('auth.login');
    }

    public function store(Request $request) 
    {
        $user = $request->validate([
            'email' => ['required', Email::default()],
            'password' => ['required', Password::min(6)]
        ]);

        if (! Auth::attempt($user)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials are incorrect.'
            ]);
        }

        $request->session()->regenerate();

        return redirect('/')->with('success', 'You have successfully logged in!');
    }
    
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'You have successfully logged out!');
    }
}
