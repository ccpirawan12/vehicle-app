<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Location;
use App\Models\Vehicle;
use App\Models\Owner;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $driver   = Driver::count();
        $location = Location::count();
        $owner    = Owner::count();
        $vehicle  = Vehicle::count();

        // bar chart
        $data_barchart  = Owner::select(["name",\DB::raw(" (SELECT COUNT(1) FROM vehicles WHERE owners.id = vehicles.owner_id) as total")])->get();
        
        // doughnut chart
        $data_dochart  = Location::select(["location",\DB::raw(" (SELECT COUNT(1) FROM vehicles WHERE locations.id = vehicles.location_id) as total")])->get();
        $data_dochart2  = Vehicle::select(["status",\DB::raw(" (SELECT COUNT(1) FROM vehicles GROUP BY status) as total")])->get();
        // dd($data_dochart2->toArray());

        return view('dashboard', [
            'page_name' => 'Dashboard',
            'drivers' => $driver,
            'locations' => $location,
            'owners' => $owner,
            'vehicles' => $vehicle,
            "barchart" => $data_barchart,
            "dochart" => $data_dochart,
            "dochart2" => $data_dochart2
        ]);
    }
}
