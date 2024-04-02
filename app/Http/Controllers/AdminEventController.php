<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::when(request('search'), function ($query, $search) {
            $query->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('location', 'like', "%$search%");
        })->latest()->paginate(10);

        return view('Admin.Event.index', ['events' => $events]);
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
            'image' => 'image|file|max:255|required',
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
        $enrolledUsers = $event->enrolledUsers;

        return view('Admin.Event.show', [
            'event' => $event,
            'enrolledUsers' => $enrolledUsers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('Admin.Event.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5|max:1500',
            'date' => 'required|date',
            'image' => 'image|file|max:255',
            'time' => 'required',
            'location' => 'required',
        ]);

        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->location = $request->location;
        //save image
        if ($request->image) {
            //delete old photo
            Storage::delete('public/' . $event->image);

            //generate unique image name
            $imageName = uniqid() . "_event_photo_" . $request->image->extension();
            //save to storage
            $request->image->storeAs('public', $imageName);
            //save to database
            $event->image = $imageName;
        }
        $event->update();

        return redirect()->route('events.index')->with('message', "Successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if ($event->image) {
            //delete photo
            Storage::delete('public/' . $event->image);
        }

        $event->delete();

        return redirect()->route('events.index')->with('message', 'Successfully deleted.');
    }
}
