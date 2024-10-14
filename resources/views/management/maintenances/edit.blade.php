@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')

<form action="{{ route('maintenances.update', $maintenance->id) }}" method="POST" >
  @csrf
  @method('PUT')
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New maintenance Details</h4>
        <p class="card-description">Insert new maintenance details</p>

        <div class="forms-sample" >
          <div class="form-group">
            <label for="vehicleId">Vehicle</label>
            <select id="vehicleId" type="text" name="vehicleId"
                class="form-control">
                @foreach ($vehicles as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $maintenance->vehicleId ? "selected" : "" }}>{{ $item->licensePlate }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="maintenanceDate">Maintenance Date</label>
            <input type="date" class="form-control" id="maintenanceDate" value="{{$maintenance->maintenanceDate}}" placeholder="Maintenance Date" name="maintenanceDate" 
              required autofocus autocomplete="maintenanceDate" />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" value="{{$maintenance->description}}" placeholder="description" name="description" 
            required autofocus autocomplete="description" />
          </div>
          <div class="form-group">
            <label for="cost">Cost</label>
            <input type="text" class="form-control" id="cost" value="{{number_format($maintenance->cost,0,',',".")}}" placeholder="cost" name="cost"
            required autofocus autocomplete="cost" />
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New maintenance Details</h4>
        <p class="card-description">Insert new maintenance Details</p>
        <div class="forms-sample">
          <div class="form-group">
            <label for="workshop">Workshop</label>
            <input type="text" class="form-control" id="workshop" value="{{$maintenance_details->workshop}}" name="workshop" placeholder="Workshop" />
          </div>
          <div class="form-group">
            <label for="nextMaintenance">Next Maintenance</label>
            <input type="date" class="form-control" id="nextMaintenance" value="{{$maintenance_details->nextMaintenance}}" name="nextMaintenance" placeholder="nextMaintenance" />
          </div>
        </div>
      </div>
      <div class="card-body">
        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
        <button class="btn btn-light">
          <a href="{{ route('maintenances.index') }}" class="text-dark">Cancel</a>
        </button>
      </div>
    </div>
  </form>

  @include('layouts.partial.cost_script')
  @endsection