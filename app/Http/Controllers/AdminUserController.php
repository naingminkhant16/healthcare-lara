<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::when(request('search'), function ($query, $search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        })->latest()->paginate(10);

        return view('Admin.User.index', ['users' => $users]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('message', "Successfully deleted.");
    }

    public function changeRole(User $user)
    {
        $user->is_admin = $user->is_admin ? '0' : '1';
        $user->update();
        return back()->with('message', 'Role has successfully been changed.');
    }
}
