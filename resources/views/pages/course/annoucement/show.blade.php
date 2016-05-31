@extends('layouts.app')

@section('title', 'Annoucement Details')

@section('page-header', 'Annoucement Information')

@section('content')
  <!-- Display flashed session data on successful action -->
  @include('common.session-data')

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title">
        Details About Annoucement
      </h4>
    </div>

    <div class="panel-body">
      <div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="well">
          <h3>{{ $annoucement->title }}</h3>
          <h4>{{ $course->subject }} {{ $course->course }}-{{ $course->section }}</h4>
          <br />
          <p> {{ $annoucement->message }}</p>
        </div>
        @if (Auth::user()->id == $course->user_id)
          <form role="form" method="POST" action="{{ url('/course/' . $course->id . '/annoucement/' . $annoucement->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <!-- Delete Button -->
            <button type="submit" class="btn btn-danger pull-right">Delete</button>
          </form>
        @endif
      </div>
    </div>
  </div>

  @if (Auth::user()->id == $course->user_id)
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          Edit This Annoucement
        </h4>
      </div>

      <div class="panel-body">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/course/' . $course->id . '/annoucement/' . $annoucement->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <!-- Title -->
            <div class="form-group{{ $errors->has('title') ? ' has-error': ''}}">
              <label class="col-md-3 control-label">Title</label>

              <div class="col-md-6">
                <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $annoucement->title }}">

                @if ($errors->has('title'))
                  <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                @endif
              </div>
            </div>

            <!-- Message -->
            <div class="form-group{{ $errors->has('message') ? ' has-error': ''}}">
              <label class="col-md-3 control-label">Message</label>
              <div class="col-md-6">
                <textarea class="form-control" name="message" rows="3">{{ old('message') ? old('message') : $annoucement->message }}</textarea>

                @if ($errors->has('message'))
                  <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
                @endif
              </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
              <div class="col-md-4 col-md-offset-6">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  @endif

@endsection