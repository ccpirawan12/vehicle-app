@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Routine Check</h4>
        <p class="card-description">Insert new Routine Check details</p>
        <form action="{{ route('routines.store') }}" method="POST" class="forms-sample">
          @csrf
        <form class="forms-sample">
          <div class="form-group">
            <label for="vehicleId">Vehicle</label>
            <select id="vehicleId" type="text" name="vehicleId"
                class="form-control">
                {{-- <option value="vehicle"></option> --}}
                @foreach ($vehicles as $item)
                    <option value="{{ $item->id }}">{{ $item->licensePlate }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="checkDate">Check Date</label>
            <input type="date" class="form-control" id="checkDate" name="checkDate" placeholder="Routine Date" />
          </div>
          <div class="form-group">
            <label for="status">Status</label>
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