@extends('layouts.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Driver</h4>
        <p class="card-description">Insert new driver details</p>
        <form action="{{ route('drivers.store') }}" method="POST" class="forms-sample">
          @csrf
          <div class="form-group">
            <label for="userId">User</label>
            <select id="userId" type="text" name="userId"
                class="form-control">
                @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="licenseNumber">License Number</label>
            <input type="text" class="form-control" id="licenseNumber" name="licenseNumber" placeholder="License Number" />
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" />
          </div>
          <div class="form-group">
            <label for="vehicleId">Vehicle</label>
            <select id="vehicleId" type="text" name="vehicleId"
                class="form-control">
                @foreach ($vehicles as $item)
                    <option value="{{ $item->id }}">{{ $item->licensePlate }}</option>
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
  {{-- </div>
</div> --}}
  @endsection