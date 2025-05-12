<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

// filepath: c:\IT9_LARAVEL\app\Http\Controllers\LoginController.php
public function authenticate(Request $request)
{
    // Validate the input fields
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Attempt to log the user in
    if (Auth::attempt($credentials)) {
        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

        // Redirect to the dashboard
       return redirect()->route('dashboard');
    }

    // If login fails, redirect back with an error message
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}
}