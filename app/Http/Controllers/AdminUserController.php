<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('Admin.User.index', ['users' => $users]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('message', "Successfully deleted.");
    }
}
