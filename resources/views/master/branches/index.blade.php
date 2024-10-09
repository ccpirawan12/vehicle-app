@extends('layouts.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@if(\Auth::user()->role == "superadmin")
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
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Location</th>
              @if(\Auth::user()->role == "superadmin")
              <th>Action</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach ($locations as $location)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $location->location }}</td>
                  @if(\Auth::user()->role == "superadmin")
                  <td>
                    <div>
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                      action="{{ route('branches.destroy', $location->id) }}" method="POST">                    
                        <a href="{{ route('branches.edit', $location->id) }}"
                          class="btn btn-sm btn-inverse-success">
                          <i class="mdi mdi-table-edit" ></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-inverse-danger" type="submit">
                          <i class="mdi mdi-delete-forever" ></i>
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