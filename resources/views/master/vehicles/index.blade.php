@extends('layouts.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@if(\Auth::user()->role == "superadmin")
@section('content-action')
<a href="{{route('vehicles.create')}}"class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
  <i class="mdi mdi-plus-circle"></i>Add Data</a>
@endsection
@endif

@section('content_page')
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Vehicle Data </h4>
      <p class="card-description"> description </p>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>License Plate</th>
              <th>Model</th>
              <th>Year</th>
              <th>Status</th>
              <th>Owner</th>
              <th>Location</th>
              @if(\Auth::user()->role == "superadmin")
              <th>Action</th>
              @endif
            </tr>
          </thead>
          <tbody>
              @foreach ($vehicles as $vehicle)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $vehicle->licensePlate }}</td>
                <td>{{ $vehicle->model }}</td>
                <td>{{ $vehicle->year }}</td>
                <td>{{ $vehicle->status }}</td>
                <td>{{ $vehicle->owners->name }}</td>
                <td>{{ $vehicle->locations->location }}</td>
                @if(\Auth::user()->role == "superadmin")
                <td>
                  <button class="btn btn-sm btn-inverse-primary dropdown-toggle" type="button" data-toggle="dropdown"></button>
                  <div class="dropdown-menu">
                    <form onsubmit="return confirm('Apakah Anda Yakin?');"
                    action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                    <a href="{{ route('vehicles.show', $vehicle->id) }}"
                      class="dropdown-item mdi mdi-table text-dark">
                      Details
                    </a>
                    <a href="{{ route('vehicles.edit', $vehicle->id) }}"
                      class="dropdown-item mdi mdi-table-edit text-success">
                      Edit
                    </a>
                    <div role="separator" class="dropdown-divider"></div>
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                          class="dropdown-item mdi mdi-delete-forever text-danger"> Delete
                      </button>
                    </form>
                  </div>
                </td>
                @endif
              </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection