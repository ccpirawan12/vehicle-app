@extends('layouts.app')
@section('title')
@section('content-header', 'Contracts')
@if(\Auth::user()->role == "superadmin")
@section('content-action')
<a href="{{route('contracts.create')}}"class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
  <i class="mdi mdi-plus-circle"></i>Add Data</a>
@endsection
@endif

@section('content_page')
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Contracts Data</h4>
      <p class="card-description"> description
      </p>
        <table class="table table-hover" id="table-data">
          <thead>
            <tr>
              {{-- <th>No.</th> --}}
              <th>Contract Date</th>
              <th>Contract End</th>
              <th>Owner</th>
              <th>Vehicle</th>
              <th>File</th>
              @if(\Auth::user()->role == "superadmin")
              <th>Action</th>
              @endif
            </tr>
          </thead>
          <tbody>
            {{-- @foreach ($drivers as $driver) --}}
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              {{-- <td>{{ $loop->iteration }}</td> --}}
              <td>10-10-24</td>
              <td>10-10-25</td>
              <td>Owner</td>
              <td>Vehicle</td>
              <td>File</td>
              {{-- <td>{{ $driver->users->name }}</td>
              <td>{{ $driver->licenseNumber }}</td>
              <td>{{ $driver->phone }}</td>
              <td>{{ $driver->vehicles->licensePlate }}</td> --}}
              {{-- <td>{{ $driver->vehicleId }}</td> --}}
              @if(\Auth::user()->role == "superadmin")
              <td>
                <div>
                  <form onsubmit="return confirm('Apakah Anda Yakin?');"
                    {{-- action="{{ route('drivers.destroy', $driver->id) }}" method="POST">
                    <a href="{{ route('drivers.edit', $driver->id) }}"
                      class="btn btn-sm btn-inverse-success">
                      <i class="mdi mdi-table-edit"></i>
                    </a> --}}
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-inverse-danger" type="submit">
                      <i class="mdi mdi-delete-forever"></i>
                  </button>
                  </form>
                </div>
              </td>
              @endif
            </tr>
          {{-- @endforeach --}}
          </tbody>
        </table>
      </div>
    </div>
    @include('layouts.partial.dt_script')
@endsection