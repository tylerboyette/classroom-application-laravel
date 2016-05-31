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

@endsection