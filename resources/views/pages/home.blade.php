@extends('layouts.app')

@section('title', 'Home')

@section('page-header', 'Home')

@section('content')

  <!-- Display flashed session data on successful action -->
  @include('common.session-data')

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title">
        Recent Activity...
      </h4>
    </div>

    <div class="panel-body">
      <div class="col-xs-12 col-md-10 col-md-offset-1">
        @if (!isset($recent_assignments) && count($recent_assignments) > 0)
          <div class="list-group">
            @foreach ($recent_assignments as $assignment)
              <a href="{{ url('/course/' . $assignment->course_id . '/assignment/' . $assignment->id) }}" class="list-group-item list-group-item-warning">
                <h4 class="list-group-item-heading">{{ $assignment->title }}</h4>
                <p class="list-group-item-text">{{ $assignment->course_title }}</p>
                <p class="list-group-item-text">Due Date: <u>{{ date('F jS Y \a\t h:i A', strtotime($assignment->due_date)) }}</u></p>
              </a>
            @endforeach
          </div>
        @else 
          <div class="alert alert-danger">
            There is nothing going on at the moment. Please check back later.</div>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection