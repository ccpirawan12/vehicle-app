<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Owner;
use App\Models\Contract;
use App\Models\Vehicle;
use App\Models\VehicleSpecification;
use App\Models\RoutineCheck;
use App\Models\Maintenance;
use App\Models\MaintenanceDetail;
use App\Models\Administration;
use App\Models\AdministrationsDetail;
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
        $vehicle    = Vehicle::with("owners","locations")->latest()->get();
        // dd($vehicle->owner_id);
        return view('master.vehicles.index', [
            'page_name' => 'Vehicles',
            'vehicles' => $vehicle
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('master.vehicles.create', [
            'page_name'=>'Vehicle', 
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
            'licensePlate' => 'required',
            'model' => 'required',
            'year' => 'required',
            'status' => 'required',
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
        return view('master.vehicles.details',
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
        return view('master.vehicles.edit',
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
            'licensePlate' => 'required',
            'model' => 'required',
            'year' => 'required',
            'status' => 'required',
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
        $vehicle_id = $vehicle->id;
        $contract = Contract::where("vehicleId",$vehicle_id)->first();
        $routine = RoutineCheck::where("vehicleId",$vehicle_id)->first();
        $maintenance = Maintenance::where("vehicleId",$vehicle_id)->first();
        $driver = Driver::where("vehicleId",$vehicle_id)->first();
        // dd($contract);
        if (!empty($maintenance)) {
            $maintenance_id = $maintenance->id;
        }

        $administration = Administration::where("vehicleId",$vehicle_id)->first();
        if (!empty($administration)) {
            $administration_id = $administration->id;
        } 
        
        $vehicle->delete();
        $vehicle_specifications     = VehicleSpecification::where("vehicleId",$vehicle_id)->delete();
        
        // Vehicle table relations delete
        if(!empty($administration)){
            $administration = $administration->delete();
            $administration_detail     = AdministrationsDetail::where("administrationId",$administration_id)->delete();
        }
        if(!empty($maintenance)){
            $maintenance = $maintenance->delete();
            $maintenance_detail     = MaintenanceDetail::where("maintenance_id",$maintenance_id)->delete();
        }
        if(!empty($contract)){
            $contract = $contract->delete();
        }
        if(!empty($routine)){
            $routine = $routine->delete();
        }

        // WATCHOUT! Driver Will also be deleted
        if(!empty($driver)){
            $driver = $driver->delete();
        }


        return redirect()->route('vehicles.index');
    }
}
