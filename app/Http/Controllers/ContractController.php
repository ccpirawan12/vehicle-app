<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Owner;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $contract    = Contract::with("owners","vehicles")->latest()->get();
        return view('management.contracts.index', [
            'contracts' => $contract
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $owners     = Owner::latest()->get();
        $vehicles     = Vehicle::latest()->get();
        $new_vehicle    = [];

        foreach ($owners as $owner) {
            $new_vehicle[$owner->id] = [];
            foreach ($vehicles as $vehicle) {
                if($owner->id == $vehicle->owner_id){
                    $new_vehicle[$owner->id][] = $vehicle;
                }
            }
        }
        
        return view('management.contracts.create', [
            'page_name'=>'Contracts',
            'section_name'=>'Create',
            'owners' => $owners,
            'vehicles' => $new_vehicle,
        ]);
        // dd($owners);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'contractDate' => 'required',
            'contractEnd' => 'required',
            'file' => 'required',
            'ownerId' => 'required',
            'vehicleId' => 'required',
        ]);

        $file = $request->file('file');
        $filename   = "contract_".time().".".$file->getClientOriginalExtension();
        $tujuan_upload = '/contract_files/';
        // upload file
		$file->move(".".$tujuan_upload,$filename);

        $contract = Contract::create([
            'contractDate' => $request->contractDate,
            'contractEnd' => $request->contractEnd,
            'file' => $tujuan_upload.$filename,
            'ownerId' => $request->ownerId,
            'vehicleId' => $request->vehicleId,
        ]);

        return redirect()->route('contracts.index');

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
        $contract = Contract::find($id);
        $owners = Owner::all();
        $vehicles = Vehicle::all();

        $new_vehicle    = [];

        foreach ($owners as $owner) {
            $new_vehicle[$owner->id] = [];
            foreach ($vehicles as $vehicle) {
                if($owner->id == $vehicle->owner_id){
                    $new_vehicle[$owner->id][] = $vehicle;
                }
            }
        }

        $vehicles = $new_vehicle;

        return view('management.contracts.edit',
        [
            'page_name'=>'Contract', 
            'section_name'=>'Edit'
        ], compact('contract', 'owners', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $request->validate([
            'contractDate' => 'required',
            'contractEnd' => 'required',
            'file' => 'required',
            'ownerId' => 'required',
            'vehicleId' => 'required',
        ]);

        

        $contract = Contract::find($id);

        if(!empty($request->file('file'))){

            $file = $request->file('file');
            $filename   = "contract_".time().".".$file->getClientOriginalExtension();
            $tujuan_upload = '/contract_files/';
            // upload file
            $file->move('.'.$tujuan_upload,$filename);

            $file_url   = $tujuan_upload.$filename;
        }else{
            $file_url   = $contract->file;
        }


        $contract->update([
            'contractDate' => $request->contractDate,
            'contractEnd' => $request->contractEnd,
            'file' => $file_url,
            'ownerId' => $request->ownerId,
            'vehicleId' => $request->vehicleId,
        ]);

        return redirect()->route('contracts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();

        return redirect()->route('contracts.index');
    }
}
