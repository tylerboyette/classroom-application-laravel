@extends('layouts.app')

@section('title', 'Assignment Detail')

@section('page-header', 'Assignment Information')

@section('content')
  <!-- Display flashed session data on successful action -->
  @include('common.session-data')
  
  <div class="panel panel-primary">
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

  @if (Auth::user()->id == $course_instructor)
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          Edit Assignment Information
        </h4>
      </div>

      <div class="panel-body">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/course/' . $course_id . '/assignment/' . $assignment->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <!-- Title -->
            <div class="form-group{{ $errors->has('title') ? ' has-error': '' }}">
              <label class="col-md-3 control-label">Title</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $assignment->title }}">

                @if ($errors->has('title'))
                  <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                @endif
              </div>
            </div>

            <!-- Due Date -->
            <div class="form-group{{ $errors->has('due_date') ? ' has-error': '' }}">
              <label class="col-md-3 control-label">Due Date</label>
              <div class="col-md-6">
                <input type="datetime-local" class="form-control" name="due_date" value="{{ old('due_date') ? old('due_date') : $due_date_formatted }}">

                @if ($errors->has('due_date'))
                  <span class="help-block"><strong>{{ $errors->first('due_date') }}</strong></span>
                @endif
              </div>
            </div>
            
            <!-- Description -->
            <div class="form-group{{ $errors->has('description') ? ' has-error': '' }}">
              <label class="col-md-3 control-label">Description</label>
              <div class="col-md-6">
                <textarea class="form-control" name="description" rows="3">{{ old('description') ? old('description') : $assignment->description }}</textarea>

                @if ($errors->has('description'))
                  <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                @endif
              </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
              <div class="col-md-4 col-md-offset-7">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  @endif
@endsection