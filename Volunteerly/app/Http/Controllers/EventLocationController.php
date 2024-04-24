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
        $requestData = $request->validate([
            'name' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string|max:100',
            'dateStart' => 'required|date',
            'dateEnd' => 'required|date|after:dateStart',
            'description' => 'required|string',
        ]);

        // Get the coordinates from the request
        $coordinates = $request->coordinates;
        // Format the coordinates
        $formattedCoordinates = implode(' ', explode(',', $coordinates));
        // Convert the coordinates to a PostGIS geometry type
        $geometry = DB::raw("ST_GeomFromText('POINT($formattedCoordinates)', 4326)");
        // Now you can use $geometry in your query or save it to the database
        $locationData['coordinates'] = $geometry;

        // Add city to location data
        $locationData['city'] = $requestData['city'];
        $locationData['province'] = $requestData['province'];
        // Use the null coalescing operator to handle the possibility of the street field being null
        $locationData['street'] = $requestData['street'] ?? null;

        $location = Location::create($locationData);

        // Create the event with location_id and user_id
        $eventData = array_diff_key($requestData, array_flip(['city', 'province', 'street']));
        $eventData['locations_id'] = $location->id;
        $userId = auth()->user()->getAuthIdentifier();
        $eventData['users_id'] = $userId;
        Event::create($eventData);

        return redirect()->route('welcome');
    }

}
