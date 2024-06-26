<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Event;
use App\Models\Image;
use Inertia\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\EventResource;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Resources\LocationResource;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    public function index()
    {
        $events = EventResource::collection(Event::paginate(12));
        $images = Image::all()->groupBy('events_id'); 
        
        return inertia('Welcome', [
            'events' => $events,
            'images' => $images,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
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

        return redirect()->route('welcome');
    }
    public function edit(Event $event)
    {
        $images = $event->image;


        return Inertia::render('Events/Edit', [
            'event' => new EventResource($event),
            'images' => $images,
        ]);
    }


    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'dateStart' => 'required|date',
            'dateEnd' => 'required|date|after:dateStart',
        ]);

        $event->update($validatedData);

        return Redirect::route('my-events');
    }
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $events = EventResource::collection(Event::paginate(12));
        $images = $event->image;


        return inertia('Events/Show', [
            'event' => new EventResource($event),
            'events' => $events,
            'images' => $images,
        ]);
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return back();
    }
    public function showMyEvents()
    {
        $events = Event::all();
        $images = Image::all();

        $user = auth()->user();

        // Filter events that belong to the authenticated user
        $userEvents = $events->filter(function ($event) use ($user) {
            return $event->users_id === $user->id;
        });

        // Initialize an array to store images for each event
        $eventImages = [];

        foreach ($userEvents as $event) {
            // Filter images that belong to the current event
            $eventImages[$event->id] = $images->filter(function ($image) use ($event) {
                return $image->events_id === $event->id;
            });
        }

        return inertia('Events/ShowMyEvents', [
            'events' => $userEvents,
            'images' => $eventImages,
        ]);
    }

}
