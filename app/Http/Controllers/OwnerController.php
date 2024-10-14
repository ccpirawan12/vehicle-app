<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\VehicleSpecification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('master.owners.index', [
            'page_name' => 'Vehicle Owner',
            'owners' => Owner::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('master.owners.create', [
            'page_name'=>'Vehicle Owner', 
            'section_name'=>'Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'contactInfo' => 'required'
        ]);

        Owner::create([
            'name' => $request->name,
            'contactInfo' => $request->contactInfo,
        ]);

        return redirect()->route('owners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $owners = Owner::findOrFail($id);

        return view('master.owners.edit',
            [
                'page_name'=>'Vehicle Owner', 
                'section_name'=>'Edit'
            ], compact('owners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'contactInfo' => 'required'
        ]);

        $owners = Owner::findOrFail($id);

        $owners->update([
            'name' => $request->name,
            'contactInfo' => $request->contactInfo,
        ]);

        return redirect()->route('owners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $owner = Owner::findOrFail($id);
        $owner_id   = $owner->id;
        $vehicle     = Vehicle::where("owner_id",$owner_id)->first();
        $vehicle_id   = $vehicle->id;

        $owner->delete();

        $vehicle     = $vehicle->delete();
        $vehicle_specifications     = VehicleSpecification::where("vehicleId",$vehicle_id)->delete();

        return redirect()->route('owners.index');
    }
}
