<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

//User Public Routes
Route::get("/", [PublicController::class, "home"])->name('public.home');

//Admin Routes
Route::prefix("/admin")->middleware(['auth', IsAdmin::class])->group(function () {
    //dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    //events
    Route::resource('/events', AdminEventController::class);
});

//Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});
