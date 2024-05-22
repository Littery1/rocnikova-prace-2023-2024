<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Event;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventLocationController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $locations = Location::all();

        return inertia('Welcome', ['events' => $events, 'locations' => $locations]);
    }
    public function store(Request $request)
    {        
        $validatedEventData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'dateStart' => 'required|date',
            'dateEnd' => 'required|date|after:dateStart',
        ]);

        $locationData = $request->validate([
            'city' => 'required|string',
            'province' => 'required|string',
            'street' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $location = Location::create($locationData);

        $eventData = array_merge($validatedEventData, ['locations_id' => $location->id, 'users_id' => auth()->user()->getAuthIdentifier()]);
        Event::create($eventData);

        return redirect()->route('welcome');
 }

}
