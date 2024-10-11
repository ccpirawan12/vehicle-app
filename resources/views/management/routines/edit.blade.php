@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Routine</h4>
        <p class="card-description">Insert new Routine details</p>
        <form action="{{ route('routines.update', $routines->id) }}" method="POST" class="forms-sample">
          @csrf
          @method('PUT')
        <form class="forms-sample">
          <div class="form-group">
            <label for="vehicleId">Vehicle</label>
            <select id="vehicleId" type="text" name="vehicleId"
                class="form-control">
                {{-- @foreach ($vehicles as $item)
                    <option value="{{ $item->id }}">{{ $item->licensePlate }}</option>
                @endforeach --}}
                <option value="vehicle"></option>
            </select>
          </div>
          <div class="form-group">
            <label for="checkDate">Routine Date</label>
            <input type="text" class="form-control" id="checkDate" name="checkDate" placeholder="Routine Date" />
          </div>
          <div class="form-group">
            <label for="status">status</label>
            <input type="text" class="form-control" id="status" name="status" placeholder="status" />
          </div>

          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <button class="btn btn-light">
            <a href="{{ route('drivers.index') }}" class="text-dark">Cancel</a>
          </button>
        </form>
      </div>
    </div>
  @endsection