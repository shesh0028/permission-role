<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // Show Register Page
    public function showRegister()
    {
        return view('register'); // Ensure this file exists in resources/views/register.blade.php
    }

    // Handle Registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:user,admin',
            'permissions' => 'array',
        ]);

        // Store user in the database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'permissions' => json_encode($request->permissions), // Store as JSON
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

    // Show Login Page
    public function showLogin()
    {
        return view('login'); // Ensure this file exists in resources/views/login.blade.php
    }

    // Handle Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout Function
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}