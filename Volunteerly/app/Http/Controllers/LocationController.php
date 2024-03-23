<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::with('events')->get();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        return view('locations.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
        // Validate input
        $validatedData = $request->validate([
            'city' => 'required|string',
            'district' => 'required|string',
            'street' => 'required|string',
            'coordinates' => ['required|point'],
        ]);

        Location::create(array_merge($validatedData, ['coordinates' => $this->parseCoordinates($request->coordinates)]));

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }

    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        // Validate input
        $validatedData = $request->validate([
            'city' => 'required|string',
            'district' => 'required|string',
            'street' => 'required|string',
            'coordinates' => ['required|point'],
        ]);

        $location->update(array_merge($validatedData, ['coordinates' => $this->parseCoordinates($request->coordinates)]));

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }

    private function parseCoordinates($coordinates)
    {
        // Split coordinates string into latitude and longitude
        $parts = explode(',', $coordinates);
        $latitude = trim($parts[0]);
        $longitude = trim($parts[1]);

        // Return the formatted coordinates
        return DB::raw("POINT($latitude $longitude)");
    }
}
