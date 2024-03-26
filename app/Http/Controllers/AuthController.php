<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('Public.login-form');
    }

    public function login()
    {
        $formData = request()->validate([
            'email' => 'required|exists:users,email|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($formData)) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors([
            'error' => 'Your email or password is incorrect'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('public.home');
    }

    public function registerForm()
    {
        return view('Public.register-form');
    }

    public function register()
    {
        $formData = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create($formData);

        return back()->with('message', 'Successfully registered.You can now login.');
    }
}
