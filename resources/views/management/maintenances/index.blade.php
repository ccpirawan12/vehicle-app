@extends('layouts.app')
@section('title')
@section('content-header', 'Maintenances')
@if(\Auth::user()->role == ("superadmin"||"admin"))
@section('content-action')
<a href="{{route('maintenances.create')}}"class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
  <i class="mdi mdi-plus-circle"></i>Add Data</a>
@endsection
@endif

@section('content_page')
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Maintenance Data </h4>
    <p class="card-description"> description </p>
    <table class="table table-hover" id="table-data">
      <thead>
        <tr>
          {{-- <th>No.</th> --}}
          <th>Vehicle</th>
          <th>Maintenance Data</th>
          <th>Description</th>
          <th>Cost</th>
          @if(\Auth::user()->role == ("superadmin"||"admin"))
          <th>Action</th>
          @endif
        </tr>
      </thead>
      <tbody>
          @foreach ($maintenances as $maintenance)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            {{-- <td>{{ $loop->iteration }}</td> --}}
            <td>{{ $maintenance->vehicle->licensePlate }}</td>
            <td>{{ $maintenance->maintenanceDate }}</td>
            <td>{{ $maintenance->description }}</td>
            <td>{{ number_format($maintenance->cost,0,',',".") }}</td>
            @if(\Auth::user()->role == ("superadmin"||"admin"))
            <td>
              <button class="btn btn-sm btn-inverse-primary dropdown-toggle" type="button" data-toggle="dropdown"></button>
              <div class="dropdown-menu">
                <form onsubmit="return confirm('Apakah Anda Yakin?');"
                action="{{ route('maintenances.destroy', $maintenance->id) }}" method="POST">
                <a href="{{ route('maintenances.show', $maintenance->id) }}"
                  class="dropdown-item mdi mdi-table text-dark">
                  Details
                </a>
                <a href="{{ route('maintenances.edit', $maintenance->id) }}"
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
  @include('layouts.partial.dt_script')
@endsection