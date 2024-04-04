<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Event;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function enroll(Event $event)
    {
        //check if user is signed in
        if (!auth()->check()) {
            return redirect()->route('loginForm')->with('message', "Please login to enroll event!");
        }

        Enrollment::create([
            'user_id' => auth()->id(),
            'event_id' => $event->id
        ]);

        return back()->with('message', 'Successfully enrolled');
    }

    public function cancel(Event $event)
    {
        $enrollment = Enrollment::where('user_id', '=', auth()->id())
            ->where('event_id', '=', $event->id)->first();
        $enrollment->delete();
        return back()->with('message', "You have successfully canceled this event!");
    }
}
