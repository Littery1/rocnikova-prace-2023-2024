<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('location')->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'dateStart' => 'required|date',
            'dateEnd' => 'required|date|after:dateStart',
            'locations_id' => 'required|exists:locations,id',
        ]);

        // Assign user_id for the currently logged-in user
        $validatedData['user_id'] = Auth::id();

        Event::create($validatedData);

        return redirect()->route('dashboard');
    }


    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'dateStart' => 'required|date',
            'dateEnd' => 'required|date|after:dateStart',
            'locations_id' => 'required|exists:locations,id',
            'users_id' => 'required|exists:users,id',
        ]);

        $event->update($validatedData);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
