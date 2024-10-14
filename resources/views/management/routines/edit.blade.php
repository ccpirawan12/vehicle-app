@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Routine Check</h4>
        <p class="card-description">Insert new Routine Check details</p>
        <form action="{{ route('routines.update', $routine->id) }}" method="POST" class="forms-sample">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="vehicleId">Vehicle</label>
            <select id="vehicleId" type="text" name="vehicleId"
                class="form-control">
                @foreach ($vehicles as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $routine->vehicleId ? "selected" : "" }}>{{ $item->licensePlate }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="checkDate">Routine Date</label>
            <input type="date" class="form-control" id="checkDate" name="checkDate" placeholder="Routine Date" value="{{ $routine->checkDate }}"/>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" placeholder="status" value="{{ $routine->status }}"/>
          </div>

          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <button class="btn btn-light">
            <a href="{{ route('routines.index') }}" class="text-dark">Cancel</a>
          </button>
        </form>
      </div>
    </div>
  @endsection