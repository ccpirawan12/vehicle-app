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
        <h4 class="card-title">Owner Details</h4>
        <p class="card-description">Insert owner details</p>
        <form class="forms-sample">
          <div class="form-group">
            <label for="InputName1">Name</label>
            <input type="text" class="form-control" id="InputName1" placeholder="Name" />
          </div>
          <div class="form-group">
            <label for="InputContact1">Contact Info</label>
            <input type="text" class="form-control" id="InputContact1" placeholder="Contact Info" />
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  {{-- </div>
</div> --}}
  @endsection