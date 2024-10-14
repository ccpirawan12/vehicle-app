@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Administration Details</h4>
    <p class="card-description">Detailed administrations data</p>

    <div class="forms-sample" >
      <div class="form-group">
        <label for="vehicleId">Vehicle</label>
        <select disabled id="vehicleId" type="text" name="vehicleId"
            class="form-control">
            @foreach ($vehicles as $item)
                <option value="{{ $item->id }}" {{ $item->id == $administration->vehicleId ? "selected" : "" }}>{{ $item->licensePlate }}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="administrationDate">Administration Date</label>
        <input disabled type="date" class="form-control" id="administrationDate" value="{{$administration->administrationDate}}" placeholder="administration Date" name="administrationDate" />
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input disabled type="text" class="form-control" id="description" value="{{$administration->description}}" placeholder="description" name="description" />
      </div>
      <div class="form-group">
        <label for="cost">Cost</label>
        <input disabled type="text" class="form-control" id="cost" value="{{number_format($administration->cost,0,',',".")}}" placeholder="cost" name="cost"/>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Administration Details</h4>
    <p class="card-description">Administration Details Data</p>
    <div class="forms-sample">
      <div class="form-group">
        <label for="administrativeCategory">Administrative Category</label>
        <input disabled type="text" class="form-control" id="administrativeCategory" value="{{$administration_details->administrativeCategory}}" name="administrativeCategory" placeholder="Administrative Category" />
      </div>
      <div class="form-group">
        <label for="nextAdministration">Next Administration</label>
        <input disabled type="date" class="form-control" id="nextAdministration" value="{{$administration_details->nextAdministration}}" name="nextAdministration" placeholder="Next Administration" />
      </div>
    </div>
  </div>
</div>
@endsection