@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Branch Details Edit</h4>
        <p class="card-description">Insert new branch details</p>
        <form action="{{ route('branches.update', $locations->id) }}" method="POST" class="forms-sample">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $locations->location }}" 
              required autocomplete="location"/>
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <button class="btn btn-light">
            <a href="{{ route('branches.index') }}" class="text-dark">Cancel</a>
          </button>
        </form>
      </div>
    </div>
  @endsection