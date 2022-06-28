<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index()
    {
        $location = Location::latest()->paginate(5);
        return view('location.index', compact('location'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store(Request $request)
    {
           
        $request->validate([
            'state' => 'required',
            'district' => 'required',
            'city' => 'required',
            'updated' => 'required'           
        ]);

        Location::create($request->all());
        return redirect()->route('location.index')
            ->with('success', 'location added successfully.');
            
    }


    public function edit(Location $location)
    {
        return view('location.edit', compact('location'));
    }


    public function update(Request $request, Location $location)
    {

        $request->validate([
            'state' => 'required',
            'district' => 'required',
            'city' => 'required',
            'pincode' => 'required',
        ]);

        $location->update($request->all());
        return redirect()->route('location.index')
            ->with('success location updated successfully');
    }

    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('location.index')
            ->with('success', 'location deleted successfully');
    }

}
