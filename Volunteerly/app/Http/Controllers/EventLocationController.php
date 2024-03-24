<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Location;
use App\Models\Event;

class EventLocationController extends Controller
{
    public function store(Request $request)
    {
            $requestData = $request->validate([
                'city' => 'required|string|max:100',
                'province' => 'required|string',
                'street' => 'required|string|nullable',
                'name' => 'required|string',
                'description' => 'required|string',
                'dateStart' => 'required|date',
                'dateEnd' => 'required|date|after:dateStart',
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
