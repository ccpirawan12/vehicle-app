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
        <form class="forms-sample">
          <div class="form-group">
            <label for="InputLicensePlate1">License Plate</label>
            <input type="text" class="form-control" id="InputLicensePlate1" placeholder="License Plate" />
          </div>
          <div class="form-group">
            <label for="InputModel1">Model</label>
            <input type="text" class="form-control" id="InputModel1" placeholder="Model" />
          </div>
          <div class="form-group">
            <label for="InputYear1">Year</label>
            <input type="number" min="1900" max="2099" step="1" value="2016" class="form-control" id="InputYear1" placeholder="Year" />
          </div>
          <div class="form-group">
            <label for="InputStatus1">Status</label>
            <input type="text" class="form-control" id="InputStatus1" placeholder="Status" />
          </div>
          <div class="form-group">
            <label for="InputLocation1">Location</label>
            <input type="text" class="form-control" id="InputLocation1" placeholder="Location" />
          </div>
          <div class="form-group">
            <label for="InputOwner1">Owner</label>
            <input type="text" class="form-control" id="InputOwner1" placeholder="Owner" />
          </div>
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