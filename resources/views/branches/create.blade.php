@extends('layouts.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Branch Details</h4>
        <p class="card-description">Insert branch details</p>
        <form class="forms-sample">
          <div class="form-group">
            <label for="InputLicensePlate1">License Plate</label>
            <input type="text" class="form-control" id="InputLicensePlate1" placeholder="License Plate" />
          </div>
          <div class="form-group">
            <label for="InputLocation1">Location</label>
            <input type="text" class="form-control" id="InputLocation1" placeholder="Location" />
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  @endsection