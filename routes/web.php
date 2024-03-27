<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PublicController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

//User Public Routes
Route::get("/", [PublicController::class, "home"])->name('public.home');
Route::get('/about-us', [PublicController::class, 'aboutUs'])->name('public.about-us');
Route::get('/events', [PublicController::class, 'events'])->name('public.events');
Route::get('/events/{event}', [PublicController::class, "eventShow"])->name('public.events.show');

//enroll event
Route::post('/events/{event}/enroll', [EnrollmentController::class, 'enroll'])->name('events.enroll');

//Admin Routes
Route::prefix("/admin")->middleware(['auth', IsAdmin::class])->group(function () {
    //dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    //events
    Route::resource('/events', AdminEventController::class);
    //users
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

//Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});
//logout
Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');
