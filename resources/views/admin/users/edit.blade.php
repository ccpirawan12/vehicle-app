@extends('layouts.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-section')
  @include('layouts.partial.navbar_edit')
@endsection
@section('content_page')

<div class="card">
  <div class="card-body">
    <h4 class="card-title">User Data Edit</h4>
    <p class="card-description">Insert new user data</p>
    
    <form action="{{ route('users.update', $users->id) }}" method="POST" class="forms-sample">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $users->name }} "
          required autofocus autocomplete="name" />
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ $users->email }}"
        required autofocus autocomplete="email" />
      </div>
      <div class="form-group">
        <label for="position">Position</label>
        <select id="position" type="text" name="position"
            class="form-control">
            <option value="{{ $users->id }}" >{{$users->position}}</option>
            <option>Administrator</option>
            <option>Driver</option>
            <option>Manager</option>
            <option>Owner</option>
            <option>Vehicle Head</option>
        </select>
      </div>
      <div class="form-group">
        <label for="role">Role</label>
        <select id="role" type="text" name="role"
            class="form-control">
            <option value="{{ $users->id }}">{{ $users->role }}</option>
            <option>admin</option>
            <option>superadmin</option>
            <option>user</option>
        </select>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" id="password" placeholder="password" name="password" value="{{ $users->password }}"
        required autofocus autocomplete="password" />
      </div>
      <button type="submit" class="btn btn-primary mr-2"> Submit </button>
      <button class="btn btn-light">
        <a href="{{ route('users.index') }}" class="text-dark">Cancel</a>
      </button>
    </form>
  </div>
</div>
  @endsection