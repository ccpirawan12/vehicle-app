@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Maintenance Details</h4>
    <p class="card-description">Detailed maintenances data</p>

    <div class="forms-sample" >
      <div class="form-group">
        <label for="vehicleId">Vehicle</label>
        <select disabled id="vehicleId" type="text" name="vehicleId"
            class="form-control">
            @foreach ($vehicles as $item)
                <option value="{{ $item->id }}" {{ $item->id == $maintenance->vehicleId ? "selected" : "" }}>{{ $item->licensePlate }}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="maintenanceDate">Maintenance Date</label>
        <input disabled type="date" class="form-control" id="maintenanceDate" value="{{$maintenance->maintenanceDate}}" placeholder="Maintenance Date" name="maintenanceDate" />
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input disabled type="text" class="form-control" id="description" value="{{$maintenance->description}}" placeholder="description" name="description" />
      </div>
      <div class="form-group">
        <label for="cost">Cost</label>
        <input disabled type="text" class="form-control" id="cost" value="{{number_format($maintenance->cost,0,',',".")}}" placeholder="cost" name="cost"/>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Maintenance Details</h4>
    <p class="card-description">Maintenance Details Data</p>
    <div class="forms-sample">
      <div class="form-group">
        <label for="workshop">Workshop</label>
        <input disabled type="text" class="form-control" id="workshop" value="{{$maintenance_details->workshop}}" name="workshop" placeholder="Workshop" />
      </div>
      <div class="form-group">
        <label for="nextMaintenance">Next Maintenance</label>
        <input disabled type="date" class="form-control" id="nextMaintenance" value="{{$maintenance_details->nextMaintenance}}" name="nextMaintenance" placeholder="nextMaintenance" />
      </div>
    </div>
  </div>
</div>
@endsection