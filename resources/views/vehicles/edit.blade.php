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
        <p class="card-description">Insert vehicle details</p>

        <form action="{{ route('vehicles.store') }}" method="POST" class="forms-sample" >
          @csrf
          {{-- @method('PUT') --}}
          <div class="form-group">
            <label for="licensePlate">License Plate</label>
            <input type="text" class="form-control" id="licensePlate" placeholder="{{ $vehicles->name }}" name="licensePlate" 
              required autofocus autocomplete="licensePlate" />
          </div>
          <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" placeholder="{{ $vehicles->model }}" name="model" 
            required autofocus autocomplete="model" />
          </div>
          <div class="form-group">
            <label for="year">Year</label>
            <input type="number" min="1900" max="2099" step="1" value="2016" class="form-control" id="year" placeholder="{{ $vehicles->year }}" name="year"
            required autofocus autocomplete="year" />
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" placeholder="{{ $vehicles->status }}" name="status"
            required autofocus autocomplete="status" />
          </div>
          <div class="form-group">
            <label for="owner_id">Owner</label>
            {{-- <input type="text" class="form-control" id="owner" placeholder="Owner" 
            required autofocus autocomplete="owner" /> --}}
            <select id="owner_id" type="text" name="owner_id"
                class="form-control">
                @foreach ($owners as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="location_id">Location</label>
            {{-- <input type="text" class="form-control" id="InputLocation1" placeholder="Location" /> --}}
            <select id="location_id" type="text" name="location_id"
              class="form-control">
              @foreach ($locations as $item)
                  <option value="{{ $item->id }}">{{ $item->location }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Vehicle Spesification</h4>
        <p class="card-description">Insert vehicle details</p>
        <form class="forms-sample">
          <div class="form-group">
            <label for="InputLicenseName1">License Name</label>
            <input type="text" class="form-control" id="InputLicenseName1" placeholder="License Name" />
          </div>
          <div class="form-group">
            <label for="InputType1">Type</label>
            <input type="text" class="form-control" id="InputType1" placeholder="Type" />
          </div>
          <div class="form-group">
            <label for="InputBrand1">Brand</label>
            <input type="text" class="form-control" id="InputBrand1" placeholder="Brand" />
          </div>
          <div class="form-group">
            <label for="InputChasisNumber1">Chasis Number</label>
            <input type="text" class="form-control" id="InputChasisNumber1" placeholder="Chasis Number" />
          </div>
          <div class="form-group">
            <label for="InputEngineNumber1">Engine Number</label>
            <input type="text" class="form-control" id="InputEngineNumber1" placeholder="Engine Number" />
          </div>
        </form>
      </div>
      <div class="card-body">
        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
        <button class="btn btn-light">Cancel</button>
      </div>
    </div>
  @endsection