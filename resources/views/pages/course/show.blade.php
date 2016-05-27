@extends('layouts.app')

@section('title', 'Course Details')

@section('page-header', 'Course Details')

@section('content')
  <div class="panel panel-info">
    <div class="panel-heading">
      Basic Course Information
    </div>

    <div class="panel-body">
      <!-- Display flashed session data on successful action -->
      @if (session('status'))
        <div class="alert alert-success alert-dismissable" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          {{ session('status') }}
        </div>
      @endif

      <div class="col-xs-12 col-md-10">
        <h3>{{ $course->subject }} {{ $course->course }}-{{ $course->section }}</h3>
        <p><strong>Instructor:</strong> {{ $instructor->first_name }} {{ $instructor->last_name }}</p>
        <p><strong>Title:</strong> {{ $course->title }}</p>
      </div>
    </div>
  </div>

  @if (Auth::user()->id == $instructor->id)
    <div class="panel panel-warning">
      <div class="panel-heading">
        Delete or edit this course
      </div>

      <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('course/' . $course->id) }}">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <!-- Subject -->
          <div class="form-group{{ $errors->has('subject') ? ' has-error': '' }}">
            <label class="col-md-3 control-label">Subject</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="subject" value="{{ old('subject') ? old('subject') : $course->subject }}">

              @if ($errors->has('subject'))
                <span class="help-block"><strong>{{ $errors->first('subject') }}</strong></span>
              @endif
            </div>
          </div>

          <!-- Title -->
          <div class="form-group{{ $errors->has('title') ? ' has-error': '' }}">
            <label class="col-md-3 control-label">Title</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $course->title }}">

              @if ($errors->has('title'))
                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
              @endif
            </div>
          </div>

          <!-- Course -->
          <div class="form-group{{ $errors->has('course') ? ' has-error': '' }}">
            <label class="col-md-3 control-label">Course</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="course" value="{{ old('course') ? old('course') : $course->course }}">

              @if ($errors->has('course'))
                <span class="help-block"><strong>{{ $errors->first('course') }}</strong></span>
              @endif
            </div>
          </div>

          <!-- Section -->
          <div class="form-group{{ $errors->has('section') ? ' has-error': '' }}">
            <label class="col-md-3 control-label">Section</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="section" value="{{ old('section') ? old('section') : $course->section }}">

              @if ($errors->has('section'))
                <span class="help-block"><strong>{{ $errors->first('section') }}</strong></span>
              @endif
            </div>
          </div>

          <!-- Edit Button -->
          <div class="form-group">
            <div class="col-md-4 col-md-offset-3">
              <button type="submit" class="btn btn-success">Edit</button>
            </div>
          </div>

        </form>
        <div class="col-md-5 col-md-offset-3">
          <form role="form" method="POST" action="{{ url('/course/' . $course->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
  
            <!-- Delete Button -->
            <div class="form-group">
              <button type="submit" class="btn btn-danger btn-lg btn-block">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endif
@endsection