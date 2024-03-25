<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Event;

class EventLocationController extends Controller
{
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

        // Create the location
        $locationData = array_intersect_key($requestData, array_flip(['city', 'province', 'street']));
        $locationData['coordinates'] = $request->coordinates;
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
