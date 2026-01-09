<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('edit.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'username'   => 'required|string|max:255|unique:users,username,' . $user->id,
            'email'      => 'required|email|max:255|unique:users,email,' . $user->id,
        ],[
            'username.unique' => 'The username has already been taken.',
            'email.unique' => 'The email has already been taken.',
        ]);

        $user->update($validated);

        return redirect()->route('dashboard.profile')->with('success', 'Profile updated successfully.');
    }
}
