@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')

<form action="{{ route('administrations.update', $administration->id) }}" method="POST" >
  @csrf
  @method('PUT')
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Administration Details</h4>
        <p class="card-description">Insert new administration details</p>

        <div class="forms-sample" >
          <div class="form-group">
            <label for="vehicleId">Vehicle</label>
            <select id="vehicleId" type="text" name="vehicleId"
                class="form-control">
                @foreach ($vehicles as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $administration->vehicleId ? "selected" : "" }}>{{ $item->licensePlate }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="administrationDate">administration Date</label>
            <input type="date" class="form-control" id="administrationDate" value="{{$administration->administrationDate}}" placeholder="administration Date" name="administrationDate" 
              required autofocus autocomplete="administrationDate" />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" value="{{$administration->description}}" placeholder="description" name="description" 
            required autofocus autocomplete="description" />
          </div>
          <div class="form-group">
            <label for="cost">Cost</label>
            <input type="text" class="form-control" id="cost" value="{{number_format($administration->cost,0,',',".")}}" placeholder="cost" name="cost"
            required autofocus autocomplete="cost" />
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New administration Details</h4>
        <p class="card-description">Insert new administration Details</p>
        <div class="forms-sample">
          <div class="form-group">
            <label for="administrativeCategory">Administrative Category</label>
            <input type="text" class="form-control" id="administrativeCategory" value="{{$administration_details->administrativeCategory}}" name="administrativeCategory" placeholder="Administrative Category" />
          </div>
          <div class="form-group">
            <label for="nextAdministration">Next administration</label>
            <input type="date" class="form-control" id="nextAdministration" value="{{$administration_details->nextAdministration}}" name="nextAdministration" placeholder="Next Administration" />
          </div>
        </div>
      </div>
      <div class="card-body">
        <button type="submit" class="btn btn-primary mr-2"> Submit </button>
        <button class="btn btn-light">
          <a href="{{ route('administrations.index') }}" class="text-dark">Cancel</a>
        </button>
      </div>
    </div>
  </form>

  @include('layouts.partial.cost_script')
  @endsection