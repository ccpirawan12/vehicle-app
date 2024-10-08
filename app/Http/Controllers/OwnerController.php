<?php

namespace App\Http\Controllers;

use App\Models\Owner;
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
        return view('owners.index', [
            'owners' => Owner::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // return view('masters.owners.create');
        return view('owners.create', [
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
            'name' => 'required|min:5',
            'contactInfo' => 'required|min:5'
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

        return view('owners.edit',
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
            'name' => 'required|min:5',
            'contactInfo' => 'required|min:5'
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
        $owners = Owner::findOrFail($id);

        $owners->delete();

        return redirect()->route('owners.index');
    }
}
