@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')

<form action="{{ route('administrations.store') }}" method="POST" >
  @csrf
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
                    <option value="{{ $item->id }}">{{ $item->licensePlate }}</option>
                @endforeach
                <option value="vehicle"></option>
            </select>
          </div>
          <div class="form-group">
            <label for="administrationDate">Administration Date</label>
            <input type="date" class="form-control" id="administrationDate" placeholder="administration Date" name="administrationDate" 
              required autofocus autocomplete="administrationDate" />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="description" name="description" 
            required autofocus autocomplete="description" />
          </div>
          <div class="form-group">
            <label for="cost">Cost</label>
            <input type="text" class="form-control" id="cost" placeholder="cost" name="cost"
            required autofocus autocomplete="cost" />
          </div>
        </div>
      </div>
    </div>
    {{-- Details --}}
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New administration Details</h4>
        <p class="card-description">Insert new administration Details</p>
        <div class="forms-sample">
          <div class="form-group">
            <label for="administrativeCategory">Administrative Category</label>
            <input type="text" class="form-control" id="administrativeCategory" name="administrativeCategory" placeholder="administrativeCategory" 
            required autofocus autocomplete="administrativeCategory" s/>
          </div>
          <div class="form-group">
            <label for="nextAdministration">nextAdministration</label>
            <input type="date" class="form-control" id="nextAdministration" name="nextAdministration" placeholder="nextAdministration" 
            required autofocus autocomplete="nextAdministration" />
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