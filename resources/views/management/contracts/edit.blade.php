@extends('layouts.app')
@section('title')
@section('content-header')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create New Contract</h4>
        <p class="card-description">Insert new Contract details</p>
        <form action="{{ route('drivers.update', $contracts->id) }}" method="POST" class="forms-sample">
          @csrf
          @method('PUT')
        <form class="forms-sample">
          <div class="form-group">
            <label for="contracDate">Contract Date</label>
            <input type="text" class="form-control" id="contracDate" name="contracDate" placeholder="Contract Date" />
          </div>
          <div class="form-group">
            <label for="contracEnd">Contract End</label>
            <input type="text" class="form-control" id="contracEnd" name="contracEnd" placeholder="Contract End" />
          </div>
          <div class="form-group">
            <label for="File">File</label>
            <input type="text" class="form-control" id="File" name="File" placeholder="File" />
          </div>
          <div class="form-group">
            <label for="ownerId">Owner</label>
            <select id="ownerId" type="text" name="ownerId"
                class="form-control">
                {{-- @foreach ($users as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach --}}
                <option value="Owner"></option>
            </select>
          </div>
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
          <button type="submit" class="btn btn-primary mr-2"> Submit </button>
          <button class="btn btn-light">
            <a href="{{ route('drivers.index') }}" class="text-dark">Cancel</a>
          </button>
        </form>
      </div>
    </div>
  @endsection