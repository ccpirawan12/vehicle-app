@extends('layouts.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')
<div class="card">
    <div class="card-body">
    <h4 class="card-title">Owner Details</h4>
    <p class="card-description">Insert owner details</p>
    <form action="{{route('owners.update', $owners->id)}}" method="POST" class="forms-sample">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="{{ $owners->name }}" 
            required autocomplete="name"/>
        </div>
        <div class="form-group">
        <label for="contactInfo">Contact Info</label>
        <input type="text" class="form-control" id="contactInfo" name="contactInfo" placeholder="{{ $owners->contactInfo}}" 
            required autocomplete="contactInfo"/>
        </div>
        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
        <button class="btn btn-light">Cancel</button>
    </form>
    </div>
</div>
  @endsection