@extends('layouts.app')
@section('title')
@section('content-header', 'Routine Checks')
@if(\Auth::user()->role == ("superadmin"||"admin"))
@section('content-action')
<a href="{{route('routines.create')}}"class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
  <i class="mdi mdi-plus-circle"></i>Add Data</a>
@endsection
@endif

@section('content_page')
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Routines Checks Data</h4>
    <p class="card-description"> description
    </p>
    <table class="table table-hover" id="table-data">
      <thead>
        <tr>
          {{-- <th>No.</th> --}}
          <th>Vehicle</th>
          <th>Check Date</th>
          <th>Status</th>
          @if(\Auth::user()->role == ("superadmin"||"admin"))
          <th>Action</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @foreach ($routines as $routine)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          {{-- <td>{{ $loop->iteration }}</td> --}}
          <td>{{ $routine->vehicles->licensePlate }}</td>
          <td>{{ $routine->checkDate }}</td>
          <td>{{ $routine->status }}</td>
          @if(\Auth::user()->role == ("superadmin"||"admin"))
          <td>
            <div>
              <form onsubmit="return confirm('Apakah Anda Yakin?');"
                action="{{ route('routines.destroy', $routine->id) }}" method="POST">
                <a href="{{ route('routines.edit', $routine->id) }}" 
                  class="btn btn-sm btn-inverse-success">
                  <i class="mdi mdi-table-edit"></i>
                </a>
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
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@include('layouts.partial.dt_script')
@endsection