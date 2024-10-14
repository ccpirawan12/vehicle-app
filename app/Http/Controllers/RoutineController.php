<?php

namespace App\Http\Controllers;

use App\Models\RoutineCheck;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $routine    = RoutineCheck::with("vehicles")->latest()->get();
        return view('management.routines.index', [
            'routines' => $routine
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('management.routines.create', [
            'page_name'=>'Routine Check',
            'section_name'=>'Create',
            'routines' => RoutineCheck::latest()->get(),
            'vehicles' => Vehicle::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        $request->validate([        
            'vehicleId' => 'required',
            'checkDate' => 'required',
            'status' => 'required',
        ]);

        // dd($request->all());

        $routine = RoutineCheck::create([
            'vehicleId' => $request->vehicleId,
            'checkDate' => $request->checkDate,
            'status' => $request->status,
        ]);

        return redirect()->route('routines.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $routine = RoutineCheck::find($id);
        $vehicles = Vehicle::all();
        return view('management.routines.edit',
        [
            'page_name'=>'Routine Check', 
            'section_name'=>'Edit'
        ], compact('routine', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'checkDate' => 'required',
            'vehicleId' => 'required',
            'status' => 'required',
        ]);
        
        
        $routine = RoutineCheck::find($id);
        $routine->update([
            'checkDate' => $request->checkDate,
            'vehicleId' => $request->vehicleId,
            'status' => $request->status,
        ]);
        
        return redirect()->route('routines.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $routine = RoutineCheck::findOrFail($id);
        $routine->delete();

        return redirect()->route('routines.index');
    }
}
