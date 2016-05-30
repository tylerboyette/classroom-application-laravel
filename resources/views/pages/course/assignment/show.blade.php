@extends('layouts.app')

@section('title', 'Assignment Detail')

@section('page-header', 'Assignment Information')

@section('content')
  <!-- Display flashed session data on successful action -->
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
        Details About Assignment
      </h4>
    </div>

    <div class="panel-body">
      <div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="well">
          <h3>{{ $assignment->title }}</h3>
          <h4>{{ $course_name }}</h4>
          <p><strong>Due Date:</strong> <u>{{ date('F jS Y \a\t h:i A', strtotime($assignment->due_date)) }}</u></p>
          <br />
          <p>{{ $assignment->description }}</p>
        </div>
        @if (Auth::user()->id == $course_instructor)
          <form role="form" method="post" action="{{ url('/course/' . $course_id . '/assignment/' . $assignment->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <!-- Delete Button -->
            <button type="submit" class="btn btn-danger pull-right">Delete</button>
          </form>
        @endif
      </div>
    </div>
  </div>
@endsection