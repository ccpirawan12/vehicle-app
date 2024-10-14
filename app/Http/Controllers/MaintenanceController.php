<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\MaintenanceDetail;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenance    = Maintenance::with("vehicle")->latest()->get();
        return view('management.maintenances.index', [
            'page_name' => 'Maintenances',
            'maintenances' => $maintenance
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.maintenances.create', [
            'page_name'=>'Maintenance',
            'section_name'=>'Create',
            'maintenances' => Maintenance::latest()->get(),
            'vehicles' => Vehicle::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->description);
        // $request->validate([
        //     'vehicleId' => 'required',
        //     'maintenanceDate' => 'required',
        //     'description' => 'required',
        //     'cost' => 'required',
        //     'maintenance_detailId' => 'required',
        // ]);

        $cost       = str_replace(".","",$request->cost);
        
        $maintenance = Maintenance::create([
            'vehicleId' => $request->vehicleId,
            'maintenanceDate' => $request->maintenanceDate,
            'description' => $request->description,
            'cost' => $cost,
        ]);
        
        // dd($request->all());
        MaintenanceDetail::create([
            'workshop' => $request->workshop,
            'nextMaintenance' => $request->nextMaintenance,
            'maintenance_id' => $maintenance->id
        ]);

        return redirect()->route('maintenances.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $maintenance = Maintenance::find($id);
        $vehicles = Vehicle::all();
        $maintenance_details = MaintenanceDetail::where("maintenance_id",$maintenance->id)->first();
        return view('management.maintenances.details',
        [
            'page_name'=>'Maintenance', 
            'section_name'=>'Details'
        ], compact('maintenance', 'vehicles', 'maintenance_details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $maintenance = Maintenance::find($id);
        $vehicles = Vehicle::all();
        $maintenance_details = MaintenanceDetail::where("maintenance_id",$maintenance->id)->first();
        return view('management.maintenances.edit',
        [
            'page_name'=>'Maintenance', 
            'section_name'=>'Edit'
        ], compact('maintenance', 'vehicles', 'maintenance_details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $cost       = str_replace(".","",$request->cost);
        $maintenance = Maintenance::find($id);
        $maintenance->update([
            'vehicleId' => $request->vehicleId,
            'maintenanceDate' => $request->maintenanceDate,
            'description' => $request->description,
            'cost' => $cost,
        ]);
        
        // dd($request->all());
        $maintenance_details = MaintenanceDetail::where("maintenance_id", $maintenance->id)->first();
        $maintenance_details->update([
            'workshop' => $request->workshop,
            'nextMaintenance' => $request->nextMaintenance,
        ]);

        return redirect()->route('maintenances.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->delete();

        $maintenance_details     = MaintenanceDetail::where("maintenance_id",$maintenance->id)->delete();

        return redirect()->route('maintenances.index');
    }
}
