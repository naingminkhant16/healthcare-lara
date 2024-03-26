<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.Event.index', ['events' => Event::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData =   $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5|max:1500',
            'date' => 'required|date',
            'image' => 'image|file|max:255',
            'time' => 'required|date_format:H:i',
            'location' => 'required',
        ]);

        $event = new Event();
        $event->title = $formData['title'];
        $event->description = $formData['description'];
        $event->date = $formData['date'];
        $event->time = $formData['time'];
        $event->location = $formData['location'];

        //save image
        if ($request->image) {
            //generate unique image name
            $imageName = uniqid() . "_event_photo_" . $request->image->extension();
            //save to storage
            $request->image->storeAs('public', $imageName);
            //save to database
            $event->image = $imageName;
        }
        $event->save();

        return redirect()->route('events.index')->with('message', "New Event is successfully created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return $event;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
