<?php

namespace App\Http\Controllers;

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
        return view('management.routines.index', [
            'page_name' => 'Routine',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.routines.create', [
            'page_name'=>'routines',
            'section_name'=>'Create',
            // 'drivers' => Driver::latest()->get(),
            // 'users' => User::latest()->get(),
            // 'vehicles' => Vehicle::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
