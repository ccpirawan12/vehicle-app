@extends('layouts.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-action')
<a href="{{route('drivers.create')}}"class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
  <i class="mdi mdi-plus-circle"></i>Add Data</a>
@endsection

@section('content_page')
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Drivers Data</h4>
      <p class="card-description"> description
      </p>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>User ID</th>
              <th>License Number</th>
              <th>Phone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Jacob</td>
              <td>2018</td>
              <td>08123352933</td>
              <td>
                <button class="btn btn-sm btn-outline-dark dropdown-toggle" type="button" data-toggle="dropdown"></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Details</a>
                  <div role="separator" class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Edit</a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
@endsection