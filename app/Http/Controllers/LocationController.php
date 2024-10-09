<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('master.branches.index', [
            'locations' => Location::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.branches.create', [
            'page_name'=>'Branch', 
            'section_name'=>'Create
        ']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'location' => 'required|min:4',
        ]);

        Location::create([
            'location' => $request->location,
        ]);

        return redirect()->route('branches.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $locations = Location::findOrFail($id);

        return view('master.branches.edit', [
            'page_name'=>'Location', 
            'section_name'=>'Edit'
        ],
        compact('locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'location' => 'required|min:4',
        ]);

        $locations = Location::findOrFail($id);

        $locations->update([
            'location' => $request->location,
        ]);

        return redirect()->route('branches.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $locations = Location::findOrFail($id);

        $locations->delete();

        return redirect()->route('branches.index');
    }
}
