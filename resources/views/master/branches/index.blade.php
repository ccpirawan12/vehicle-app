@extends('layouts.app')
@section('title')
@section('content-header', 'Branch')
@if(\Auth::user()->role == ("superadmin"||"admin"))
@section('content-action')
<a href="{{route('branches.create')}}"class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
  <i class="mdi mdi-plus-circle"></i>Add Data</a>
@endsection
@endif

@section('content_page')
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Branch Data</h4>
      <p class="card-description"> Branch location data
      </p>
        <table class="table table-hover" id="table-data">
          <thead>
            <tr>
              {{-- <th>No.</th> --}}
              <th>Location</th>
              @if(\Auth::user()->role == ("superadmin"||"admin"))
              <th>Action</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach ($locations as $location)
              <tr>
                  {{-- <td>{{ $loop->iteration }}</td> --}}
                  <td>{{ $location->location }}</td>
                  @if(\Auth::user()->role == ("superadmin"||"admin"))
                  <td>
                    <div>
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                      action="{{ route('branches.destroy', $location->id) }}" method="POST">                    
                        <a href="{{ route('branches.edit', $location->id) }}"
                          class="btn btn-sm btn-inverse-success">
                          <i class="mdi mdi-table-edit" ></i>
                        </a>
                        @if(\Auth::user()->role == ("superadmin"))
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-inverse-danger" type="submit">
                          <i class="mdi mdi-delete-forever" ></i>
                        </button>
                        @endif
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