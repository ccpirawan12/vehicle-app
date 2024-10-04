<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Owner;
use App\Models\Vehicle;
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
        // $vehicles = Vehicle::latest()->get();

        // return view('masters.vehicles.index', compact('vehicles'));

        // return view('masters.vehicles.index', [
        //     'vehicles' => Vehicle::latest()->get(),
        //     'owners' => Owner::latest()->get(),
        //     'locations' => Location::latest()->get(),
        // ]);

        return view('masters.vehicles.index', [
            'vehicles' => Vehicle::with('owners')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // $vehicles = Vehicle::with(['owners', 'locations'])->latest()->get();

        // return view('masters.vehicles.create', compact('vehicles'));

        return view('masters.vehicles.create', [
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

        Vehicle::create([
            'licensePlate' => $request->licensePlate,
            'model' => $request->model,
            'year' => $request->year,
            'status' => $request->status,
            'owner_id' => $request->owner_id,
            'location_id' => $request->location_id,
        ]);

        return redirect()->route('vehicles.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
