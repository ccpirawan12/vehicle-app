@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')
<div class="card">
    <div class="card-body">
    <h4 class="card-title">Owner Details Edit</h4>
    <p class="card-description">Insert new owner details</p>
    <form action="{{route('owners.update', $owners->id)}}" method="POST" class="forms-sample">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $owners->name }}" 
            required autocomplete="name"/>
        </div>
        <div class="form-group">
        <label for="contactInfo">Contact Info</label>
        <input type="text" class="form-control" id="contactInfo" name="contactInfo" value="{{ $owners->contactInfo}}" 
            required autocomplete="contactInfo"/>
        </div>
        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
        <button class="btn btn-light">
            <a href="{{ route('owners.index') }}" class="text-dark">Cancel</a>
          </button>
    </form>
    </div>
</div>
  @endsection