@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Driver Details Edit</h4>
        <p class="card-description">Insert new driver details</p>
        <form action="{{ route('drivers.update', $driver->id) }}" method="POST" class="forms-sample">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="userId">User</label>
            <select id="userId" type="text" name="userId"
                class="form-control">
                @foreach ($user as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $driver->userId ? "selected" : "" }}>{{ $item->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="licenseNumber">License Number</label>
            <input type="text" class="form-control" id="licenseNumber" name="licenseNumber" placeholder="License Number" value="{{ $driver->licenseNumber }}"/>
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ $driver->phone }}"/>
          </div>
          <div class="form-group">
            <label for="vehicleId">Vehicle</label>
            <select id="vehicleId" type="text" name="vehicleId"
                class="form-control">
                @foreach ($vehicle as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $driver->vehicleId ? "selected" : "" }}>{{ $item->licensePlate }}</option>
                @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <button class="btn btn-light">
            <a href="{{ route('drivers.index') }}" class="text-dark">Cancel</a>
          </button>
        </form>
      </div>
    </div>
  @endsection