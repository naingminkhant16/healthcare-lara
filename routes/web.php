<?php

use App\Http\Controllers\AdminArticleController;
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
Route::get('contact-us', [PublicController::class, 'contactUs'])->name('public.contact-us');
//Public events routes
Route::get('/events', [PublicController::class, 'events'])->name('public.events');
Route::get('/events/{event}', [PublicController::class, "eventShow"])->name('public.events.show');
Route::get('/events/{user}/enrolled-events', [PublicController::class, "enrolledEvents"])
    ->middleware('auth')->name("users.enrolled.events");
//enroll event
Route::post('/events/{event}/enroll', [EnrollmentController::class, 'enroll'])->name('events.enroll');
//Public articles routes
Route::get('/articles', [PublicController::class, 'articles'])->name('public.articles');
Route::get('/articles/{article}', [PublicController::class, "articleShow"])->name('public.articles.show');
//Search route
Route::get('/search', [PublicController::class, 'search'])->name('public.search');

//Admin Routes
Route::prefix("/admin")->middleware(['auth', IsAdmin::class])->group(function () {
    //dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    //events
    Route::resource('/events', AdminEventController::class);
    //articles
    Route::resource('/articles', AdminArticleController::class);
    //users
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    //change user role
    Route::patch('/users/{user}/change-role', [AdminUserController::class, 'changeRole'])->name('admin.users.changeRole');
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
