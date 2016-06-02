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
        @if (count($recent_activity) > 0)
          <div class="list-group">
            @foreach ($recent_activity as $activity)
              @if ($activity->type == 'assignment')
                <a href="{{ url('/course/' . $activity->course_id . '/assignment/' . $activity->id) }}" class="list-group-item list-group-item-success">
                  <h4 class="list-group-item-heading">{{ $activity->course_info }} - {{ $activity->title }}</h4>
                  <p class="list-group-item-text">
                    <p>{{ date('F jS Y \a\t h:i A', strtotime($activity->created_at)) }}</p>
                    <p>{{ $activity->description }}</p>
                  </p>
                </a>
              @else
                <a href="{{ url('/course/' . $activity->course_id . '/annoucement/' . $activity->id) }}" class="list-group-item list-group-item-info">
                  <h4 class="list-group-item-heading">{{ $activity->course_info }} - {{ $activity->title }}</h4>
                  <p class="list-group-item-text">
                    <p>{{ date('F jS Y \a\t h:i A', strtotime($activity->created_at)) }}</p>
                    <p>{{ $activity->message }}</p>
                  </p>
                </a>
              @endif
            @endforeach
          </div>
        @else
          <div class="alert alert-danger">
            There is no recent activity. Please check back again later.
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection