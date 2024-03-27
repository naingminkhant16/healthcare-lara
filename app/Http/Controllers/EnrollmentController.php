<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Event;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function enroll(Event $event)
    {
        if (!auth()->check()) {
            return redirect()->route('loginForm')->with('message', "Please login to enroll event!");
        }

        Enrollment::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id
        ]);

        return back()->with('message', 'Successfully enrolled');
        // if($result)
    }
}
