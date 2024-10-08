@extends('layouts.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-action')
<a href="{{route('owners.create')}}"class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
  <i class="mdi mdi-plus-circle"></i>Add Data</a>
@endsection

@section('content_page')
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Owners Data</h4>
      <p class="card-description"> Vehicles owner data
      </p>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Contact Info</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($owners as $owner)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $owner->name }}</td>
                  <td>{{ $owner->contactInfo }}</td>
                  <td>
                    {{-- <button class="btn btn-sm btn-outline-dark dropdown-toggle" type="button" data-toggle="dropdown"></button>
                    <div class="dropdown-menu"> --}}
                    <div>
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');"
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
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
@endsection