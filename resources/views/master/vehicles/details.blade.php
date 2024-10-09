@extends('layouts.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Vehicle Details</h4>
          <p class="card-description">Detailed vehicle data and specifications</p>
  
          <div class="forms-sample" >
            <div class="form-group">
              <label for="licensePlate">License Plate</label>
              <input disabled type="text" class="form-control" id="licensePlate" value="{{ $vehicle->licensePlate }}" placeholder="License Plate" name="licensePlate" 
                required autofocus autocomplete="licensePlate" />
            </div>
            <div class="form-group">
              <label for="model">Model</label>
              <input disabled type="text" class="form-control" id="model" value="{{ $vehicle->model }}" placeholder="Model" name="model" 
              required autofocus autocomplete="model" />
            </div>
            <div class="form-group">
              <label for="year">Year</label>
              <input disabled type="number" min="1900" max="2099" step="1" value="2016" class="form-control" id="year" value="{{ $vehicle->year }}" placeholder="Year" name="year"
              required autofocus autocomplete="year" />
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <input disabled type="text" class="form-control" id="status" value="{{ $vehicle->status }}" placeholder="Status" name="status"
              required autofocus autocomplete="status" />
            </div>
            <div class="form-group">
              <label for="owner_id">Owner</label>
              <select disabled id="owner_id" type="text" name="owner_id"
                  class="form-control">
                  @foreach ($owners as $item)
                      <option value="{{ $item->id }}" {{ $item->id == $vehicle->owner_id ? "selected" : "" }} >{{ $item->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="location_id">Location</label>
              <select disabled id="location_id" type="text" name="location_id"
                class="form-control">
                @foreach ($locations as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $vehicle->location_id ? "selected" : "" }} >{{ $item->location }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Vehicle Spesification</h4>
          <p class="card-description">Insert vehicle details</p>
          <div class="forms-sample">
            <div class="form-group">
              <label for="licenseName">License Name</label>
              <input disabled type="text" class="form-control" id="licenseName" name="licenseName" value="{{ $vehicle_specifications->licenseName }}" placeholder="License Name" />
            </div>
            <div class="form-group">
              <label for="type">Type</label>
              <input disabled type="text" class="form-control" id="type" name="type" value="{{ $vehicle_specifications->type }}" placeholder="Type" />
            </div>
            <div class="form-group">
              <label for="brand">Brand</label>
              <input disabled type="text" class="form-control" id="brand" name="brand" value="{{ $vehicle_specifications->brand }}" placeholder="Brand" />
            </div>
            <div class="form-group">
              <label for="chassisNumber">Chassis Number</label>
              <input disabled type="text" class="form-control" id="chassisNumber" name="chassisNumber" value="{{ $vehicle_specifications->chassisNumber }}" placeholder="Chasis Number" />
            </div>
            <div class="form-group">
              <label for="engineNumber">Engine Number</label>
              <input disabled type="text" class="form-control" id="engineNumber" name="engineNumber" value="{{ $vehicle_specifications->engineNumber }}" placeholder="Engine Number" />
            </div>
          </div>
        </div>
      </div>

  @endsection