<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('Admin.dashboard', [
            'total_events' => Event::all()->count(),
            'total_users' => User::all()->count(),
            'total_articles' => Article::all()->count(),
        ]);
    }
}
