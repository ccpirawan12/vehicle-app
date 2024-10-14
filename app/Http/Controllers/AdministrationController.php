<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use App\Models\AdministrationsDetail;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdministrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administration    = Administration::with("vehicle")->latest()->get();
        // dd($administration);
        return view('management.administrations.index', [
            'page_name' => 'Administrations',
            'administrations' => $administration
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.administrations.create', [
            'page_name'=>'Administration',
            'section_name'=>'Create',
            'administrations' => Administration::latest()->get(),
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
        //     'administrationDate' => 'required',
        //     'description' => 'required',
        //     'cost' => 'required',
        // ]);
        $cost       = str_replace(".","",$request->cost);
        
        $administration = Administration::create([
            'vehicleId' => $request->vehicleId,
            'administrationDate' => $request->administrationDate,
            'description' => $request->description,
            'cost' => $cost,
        ]);
        
        // dd($request->all());
        AdministrationsDetail::create([
            'administrativeCategory' => $request->administrativeCategory,
            'nextAdministration' => $request->nextAdministration,
            'administrationId' => $administration->id
        ]);

        return redirect()->route('administrations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $administration = Administration::find($id);
        $vehicles = Vehicle::all();
        $administration_details = AdministrationsDetail::where("administrationId",$administration->id)->first();
        return view('management.administrations.details',
        [
            'page_name'=>'Administration', 
            'section_name'=>'Details'
        ], compact('administration', 'vehicles', 'administration_details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $administration = Administration::find($id);
        $vehicles = Vehicle::all();
        $administration_details = AdministrationsDetail::where("administrationId",$administration->id)->first();
        return view('management.administrations.edit',
        [
            'page_name'=>'administration', 
            'section_name'=>'Edit'
        ], compact('administration', 'vehicles', 'administration_details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $cost       = str_replace(".","",$request->cost);
        $administration = Administration::find($id);
        $administration->update([
            'vehicleId' => $request->vehicleId,
            'administrationDate' => $request->administrationDate,
            'description' => $request->description,
            'cost' => $cost,
        ]);
        
        // dd($request->all());
        $administration_details = AdministrationsDetail::where("administrationId", $administration->id)->first();
        $administration_details->update([
            'administrativeCategory' => $request->administrativeCategory,
            'nextAdministration' => $request->nextAdministration,
        ]);

        return redirect()->route('administrations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $administration = Administration::findOrFail($id);
        $administration->delete();

        $administration_details     = AdministrationsDetail::where("administrationId",$administration->id)->delete();

        return redirect()->route('administrations.index');
    }
}
