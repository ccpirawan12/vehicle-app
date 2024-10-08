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
        <form action="{{route('owners.store')}}" method="POST" class="forms-sample">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" 
              required autocomplete="name"/>
          </div>
          <div class="form-group">
            <label for="contactInfo">Contact Info</label>
            <input type="text" class="form-control" id="contactInfo" name="contactInfo" placeholder="Contact Info" 
              required autocomplete="contactInfo"/>
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  {{-- </div>
</div> --}}
  @endsection