<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $driver    = Driver::with("users","vehicles")->latest()->get();
        // dd($driver->toArray());
        return view('master.drivers.index', [
            'drivers' => $driver
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('master.drivers.create', [
            'page_name'=>'Drivers',
            'section_name'=>'Edit',
            'drivers' => Driver::latest()->get(),
            'users' => User::latest()->get(),
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
            'userId' => 'required',
            'licenseNumber' => 'required',
            'phone' => 'required',
            'vehicleId' => 'required',
        ]);

        // dd($request->all());
        
        $driver = Driver::create([
            'userId' => $request->userId,
            'licenseNumber' => $request->licenseNumber,
            'phone' => $request->phone,
            'vehicleId' => $request->vehicleId,
        ]);
        // dd($request->all());
        
        return redirect()->route('drivers.index');
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
        $driver = Driver::find($id);
        $user = User::all();
        $vehicle = Vehicle::all();
        return view('master.drivers.edit',
        [
            'page_name'=>'Driver', 
            'section_name'=>'Edit'
        ], compact('driver','user','vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'userId' => 'required',
            'licenseNumber' => 'required',
            'phone' => 'required',
            'vehicleId' => 'required',
        ]);

        // dd($request->all());

        $driver = Driver::find($id);
        $driver -> update([
            'userId' => $request->userId,
            'licenseNumber' => $request->licenseNumber,
            'phone' => $request->phone,
            'vehicleId' => $request->vehicleId,
        ]);
        
        return redirect()->route('drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $driver = Driver::find($id);
        $driver->delete();

        return redirect()->route('drivers.index');
    }
}
