@extends('layouts.app')
@section('title')
@section('content-header', 'Vehicle Owners')
@if(\Auth::user()->role == ("superadmin"||"admin"))
@section('content-action')
<a href="{{route('owners.create')}}"class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
  <i class="mdi mdi-plus-circle"></i>Add Data</a>
@endsection
@endif

@section('content_page')
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Owners Data</h4>
      <p class="card-description"> Vehicles owner data
      </p>
        <table class="table table-hover" id="table-data">
          <thead>
            <tr>
              {{-- <th>No.</th> --}}
              <th>Name</th>
              <th>Contact Info</th>
              @if(\Auth::user()->role == ("superadmin"||"admin"))
              <th>Action</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach ($owners as $owner)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  {{-- <td>{{ $loop->iteration }}</td> --}}
                  <td>{{ $owner->name }}</td>
                  <td>{{ $owner->contactInfo }}</td>
                  @if(\Auth::user()->role == ("superadmin"||"admin"))
                  <td>
                    <div>
                      <form onsubmit="return confirm('Apakah Anda Yakin?');"
                        action="{{ route('owners.destroy', $owner->id) }}" method="POST">
                        <a href="{{ route('owners.edit', $owner->id) }}"
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