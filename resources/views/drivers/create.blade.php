@extends('layouts.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')
{{-- <div class="row">
  <div class="col-md-6 grid-margin stretch-card"> --}}
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Driver Details</h4>
        <p class="card-description">Insert driver details</p>
        <form class="forms-sample">
          <div class="form-group">
            <label for="InputLicenseNumber1">License Number</label>
            <input type="text" class="form-control" id="InputLicenseNumber1" placeholder="License Number" />
          </div>
          <div class="form-group">
            <label for="InputLicenseNumber1">License Number</label>
            <input type="text" class="form-control" id="InputLicenseNumber1" placeholder="License Number" />
          </div>
          <div class="form-group">
            <label for="InputPhone1">Phone</label>
            <input type="text" class="form-control" id="InputPhone1" placeholder="Phone" />
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  {{-- </div>
</div> --}}
  @endsection