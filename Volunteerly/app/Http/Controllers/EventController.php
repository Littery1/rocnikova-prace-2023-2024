<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Http\Resources\LocationResource;
use App\Models\Event;
use App\Models\Location;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = EventResource::collection(Event::with('location')->paginate(12));
        $locations = LocationResource::collection(Location::paginate(12));

        return inertia('Welcome', [
            'events' => $events,
            'locations' => $locations,
        ]);
    }


    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'dateStart' => 'required|date',
            'dateEnd' => 'required|date|after:dateStart',
        ]);

        // Retrieve location ID from the session
        $locationId = session()->get('location_id');

        $eventData = array_diff_key($requestData, array_flip(['city', 'province', 'street']));
        $userId = auth()->user()->getAuthIdentifier();
        $eventData['users_id'] = $userId;
        $eventData['locations_id'] = $locationId;

        Event::create($eventData);

        // Redirect to the appropriate page
        return redirect()->route('welcome');
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
