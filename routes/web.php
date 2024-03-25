<?php

use App\Http\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Route;

//User Public Routes
Route::get("/", function () {
    return view('Public.home');
});

//Admin Routes
Route::prefix("/admin")->group(function () {
});

Route::get('/admin/login', [AdminLoginController::class, 'loginForm'])->name('admin.login');
