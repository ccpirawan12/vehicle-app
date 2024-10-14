@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')

<form action="{{ route('vehicles.store') }}" method="POST" >
  @csrf
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Vehicle Details</h4>
        <p class="card-description">Insert new vehicle details</p>

        <div class="forms-sample" >
          <div class="form-group">
            <label for="licensePlate">License Plate</label>
            <input type="text" class="form-control" id="licensePlate" placeholder="License Plate" name="licensePlate" 
              :value="old('licensePlate')" required autofocus autocomplete="licensePlate" />
          </div>
          <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" placeholder="Model" name="model" 
            required autofocus autocomplete="model" />
          </div>
          <div class="form-group">
            <label for="year">Year</label>
            <input type="number" min="1900" max="2099" step="1" value="2016" class="form-control" id="year" placeholder="Year" name="year"
            required autofocus autocomplete="year" />
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" placeholder="Status" name="status"
            required autofocus autocomplete="status" />
          </div>
          <div class="form-group">
            <label for="owner_id">Owner</label>
            <select id="owner_id" type="text" name="owner_id"
                class="form-control">
                @foreach ($owners as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="location_id">Location</label>
            <select id="location_id" type="text" name="location_id"
              class="form-control">
              @foreach ($locations as $item)
                  <option value="{{ $item->id }}">{{ $item->location }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </div>
    {{-- Spec --}}
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Vehicle Spesification</h4>
        <p class="card-description">Insert new vehicle specifications</p>
        <div class="forms-sample">
          <div class="form-group">
            <label for="licenseName">License Name</label>
            <input type="text" class="form-control" id="licenseName" name="licenseName" placeholder="License Name" />
          </div>
          <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" name="type" placeholder="Type" />
          </div>
          <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand" />
          </div>
          <div class="form-group">
            <label for="chassisNumber">Chassis Number</label>
            <input type="text" class="form-control" id="chassisNumber" name="chassisNumber" placeholder="Chasis Number" />
          </div>
          <div class="form-group">
            <label for="engineNumber">Engine Number</label>
            <input type="text" class="form-control" id="engineNumber" name="engineNumber" placeholder="Engine Number" />
          </div>
        </div>
      </div>
      <div class="card-body">
        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
        <button class="btn btn-light">
          <a href="{{ route('vehicles.index') }}" class="text-dark">Cancel</a>
        </button>
      </div>
    </div>
  </form>
  @endsection