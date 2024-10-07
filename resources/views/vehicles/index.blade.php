@extends('layouts.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-action')
<a href="{{route('vehicles.create')}}"class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
  <i class="mdi mdi-plus-circle"></i>Add Data</a>
@endsection

@section('content_page')
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Vehicle Data</h4>
      <p class="card-description"> description
      </p>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>License Plate</th>
              <th>Model</th>
              <th>Year</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Jacob</td>
              <td>Photoshop</td>
              <td>2018</td>
              <td>
                <label class="badge badge-danger">Pending</label>
              </td>
              <td>
                <button class="btn btn-sm btn-outline-dark dropdown-toggle" type="button" data-toggle="dropdown"></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Details</a>
                  <div role="separator" class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Edit</a>
                </div>
              </td>
            </tr>
            <tr>
              <td>Messsy</td>
              <td>Flash</td>
              <td>2019</td>
              <td>
                <label class="badge badge-warning">In progress</label>
              </td>
            </tr>
            <tr>
              <td>John</td>
              <td>Premier</td>
              <td>2016</td>
              <td>
                <label class="badge badge-info">Fixed</label>
              </td>
            </tr>
            <tr>
              <td>Peter</td>
              <td>After effects</td>
              <td>2017</td>
              <td>
                <label class="badge badge-success">Completed</label>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
@endsection