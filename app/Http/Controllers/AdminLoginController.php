<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function loginForm()
    {
        return view('Admin.login-form');
    }
}
