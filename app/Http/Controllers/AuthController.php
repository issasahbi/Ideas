<?php

namespace App\Http\Controllers;

use App\Mail\WelcomEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        return  view("auth.register");
    }
    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',

        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        Mail::to($user->email)->send(new WelcomEmail($user));
        return redirect()->route('dashboard')->with('success', 'user created successfully!');
    }
    public function login()
    {
        return  view("auth.login");
    }
    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'user logged in successfully!');
        }
        return redirect()->route('login')->withErrors([
            'email' => "No matching user found with this cridential",
        ]);
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route("dashboard")->with("success", "Logged out successfully!");
    }
}
