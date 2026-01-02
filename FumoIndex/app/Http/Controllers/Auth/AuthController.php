<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (auth()->attempt($credentials, $remember)) {
            return redirect()->route('home')->with('success', 'You have successfully logged in. Welcome back!');
        }

        return back()->withErrors([
            'email' => 'User or password is incorrect. Please try again.',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('auth.login.form')->with('success', 'You have successfully logged out. See you next time!');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:users',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => ucfirst(strtolower($data['first_name'])),
            'last_name'  => ucfirst(strtolower($data['last_name'])),
            'username'   => $data['username'],
            'email'      => $data['email'],
            'password'   => bcrypt($data['password']),
        ]);

        auth()->login($user);

        return redirect()->route('home')->with('success', 'Registration successful. Welcome to FumoIndex!');
    }
}
