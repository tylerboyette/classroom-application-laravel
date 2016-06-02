@extends('layouts.app')

@section('title', 'All Students')

@section('page-header', 'All Students')

@section('content')
  <!-- Display flashed session data on successful action -->
  @include('common.session-data')

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title">
        All Students In The System
      </h4>
    </div>

    <div class="panel-body">
      @if (isset($users) && count($users) > 0)
      <div class="col-md-10 col-md-offset-3">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/course/' . $course . '/student') }}">
          {{ csrf_field() }}
          
          <!-- Display all users -->
          @foreach ($users as $user)
            @if ($user->role == 'student')
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="{{ $user->id }}" value="{{ $user->id }}">
                  {{ $user->first_name }} {{ $user->last_name }} [ {{ $user->email }} ]
                </label>
              </div>
            @endif
          @endforeach

          <br />

          <!-- Submit Button -->
          <div class="form-group">
            <div class="col-md-offset-4">
              <button type="submit" class="btn btn-primary">Add Students</button>
            </div>
          </div>

        </form>
      </div>

      @endif
    </div>
  </div>
@endsection