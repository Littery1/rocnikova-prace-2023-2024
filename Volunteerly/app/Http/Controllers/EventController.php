<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Inertia\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\EventResource;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Resources\LocationResource;


class EventController extends Controller
{
    public function index()
    {
        $events = EventResource::collection(Event::paginate(12));

        return inertia('Welcome', [
            'events' => $events,
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
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return inertia('Events/Edit', [
            'event' => new EventResource($event),
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'dateStart' => 'required|date',
            'dateEnd' => 'required|date|after:dateStart',
            'locations_id' => 'required|exists:locations,id',
            'users_id' => 'required|exists:users,id',
        ]);

        $event->update($validatedData);

        return redirect()->route('events.index');
    }
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return inertia('Events/Show', [
            'event' => new EventResource($event),
        ]);
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('my-events')->with('success', 'Událost vymazána.' );
    }
    public function showMyEvents()
    {
        $events = Event::all();

        $user = auth()->user();
        $userEvents = $events->filter(function ($event) use ($user) {
            return $event->users_id === $user->id;
        });


        return inertia('Events/ShowMyEvents', [
            'events' => $userEvents,
        ]);
    }


}
