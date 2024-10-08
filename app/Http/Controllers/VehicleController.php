<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\VehicleSpecification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // return view('vehicles.index', [
        //     'vehicles' => Vehicle::with('owners')->latest()->get(),
        // ]);
        $vehicle    = Vehicle::with("owners","locations")->latest()->get();
        return view('vehicles.index', [
            'vehicles' => $vehicle
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('vehicles.create', [
            'page_name'=>'Vehicles', 
            'section_name'=>'Create',
            'vehicles' => Vehicle::latest()->get(),
            'owners' => Owner::latest()->get(),
            'locations' => Location::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        $request->validate([
            'licensePlate' => 'required|min:5',
            'model' => 'required|min:3',
            'year' => 'required|min:4',
            'status' => 'required|min:4',
            'owner_id' => 'required',
            'location_id' => 'required',
        ]);

        // dd($request->all());

        $vehicle = Vehicle::create([
            'licensePlate' => $request->licensePlate,
            'model' => $request->model,
            'year' => $request->year,
            'status' => $request->status,
            'owner_id' => $request->owner_id,
            'location_id' => $request->location_id,
        ]);

        VehicleSpecification::create([
            'vehicleId' => $vehicle->id,
            'licenseName' => $request->licenseName,
            'type' => $request->type,
            'brand' => $request->brand,
            'chassisNumber' => $request->chassisNumber,
            'engineNumber' => $request->engineNumber,
        ]);

        return redirect()->route('vehicles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicle = Vehicle::find($id);
        $owners = Owner::all();
        $locations = Location::all();
        $vehicle_specifications = VehicleSpecification::where("vehicleId",$vehicle->id)->first();
        return view('vehicles.details',
        [
            'page_name'=>'Vehicle', 
            'section_name'=>'Details'
        ], compact('vehicle', 'owners', 'locations', 'vehicle_specifications'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicle = Vehicle::find($id);
        $owners = Owner::all();
        $locations = Location::all();
        $vehicle_specifications = VehicleSpecification::where("vehicleId",$vehicle->id)->first();
        return view('vehicles.edit',
        [
            'page_name'=>'Vehicle', 
            'section_name'=>'Edit'
        ], compact('vehicle', 'owners', 'locations', 'vehicle_specifications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'licensePlate' => 'required|min:5',
            'model' => 'required|min:3',
            'year' => 'required|min:4',
            'status' => 'required|min:4',
            'owner_id' => 'required',
            'location_id' => 'required',
        ]);

        $vehicle    = Vehicle::find($id);
        $vehicle->update([
            'licensePlate' => $request->licensePlate,
            'model' => $request->model,
            'year' => $request->year,
            'status' => $request->status,
            'owner_id' => $request->owner_id,
            'location_id' => $request->location_id,
        ]);

        $vehicle_specifications = VehicleSpecification::where("vehicleId",$vehicle->id)->first();

        $vehicle_specifications->update([
            'licenseName' => $request->licenseName,
            'type' => $request->type,
            'brand' => $request->brand,
            'chassisNumber' => $request->chassisNumber,
            'engineNumber' => $request->engineNumber,
        ]);

        return redirect()->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        $vehicle_specifications     = VehicleSpecification::where("vehicleId",$vehicle->id)->delete();

        return redirect()->route('vehicles.index');
    }
}
