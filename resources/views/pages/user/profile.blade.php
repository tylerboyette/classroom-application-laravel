@extends('layouts.app')

@section('title', 'Profile')

@section('page-header', 'General Account Information')

@section('content')
  <!-- Display flashed session data on successful update -->
  @include('common.session-data')

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title">
        @if ($user->id == Auth::user()->id)
          Your profile's information, <strong>{{ $user->first_name }}</strong>.
        @else 
          Profile of {{ $user->first_name }} {{ $user->last_name }}.
        @endif
      </h4>
    </div>
    <div class="panel-body">
      <div class="col-xs-12 col-md-12">
          @if ($user->id == Auth::user()->id)
            <p><strong>First name:</strong> {{ $user->first_name }}</p>
            <p><strong>Last name:</strong> {{ $user->last_name }}</p>
            <p><strong>Role:</strong> {{ $user->role }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Updated:</strong> {{ $user->updated_at }}</p>
          @else
            <h3>Contact Form</h3>
            <hr>

            <!-- Private Message -->
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/' . $user->id . '/message') }}">
              {{ csrf_field() }}

              <!-- Title -->
                <div class="form-group {{ $errors->has('title') ? ' has-error': ''}}">
                  <label class="col-md-3 control-label">Title</label>

                  <div class="col-md-6">
                    <input type="text" class="form-control" name="title" value="{{ $errors->has('title') ? old('title') : '' }}" placeholder="Question about this weeks homework...">

                    @if ($errors->has('title'))
                      <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
                    @endif
                  </div>
                </div>

              <!-- Message -->
                <div class="form-group {{ $errors->has('message') ? ' has-error': ''}}">
                  <label class="col-md-3 control-label">Message</label>

                  <div class="col-md-6">
                    <textarea class="form-control" name="message" rows="3">{{ $errors->has('message') ? old('message') : '' }}</textarea>

                    @if ($errors->has('message'))
                      <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
                    @endif
                  </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                  <div class="col-md-4 col-md-offset-7">
                    <button type="submit" class="btn btn-primary">Send</button>
                  </div>
                </div>

            </form>
          @endif

          @if ($user->id == Auth::user()->id)
            <h3>Edit Form</h3>
            <hr>

            <!-- Edit Form -->
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/update') }}">
              {{ csrf_field() }}

              <!-- First Name -->
              <div class="form-group{{ $errors->has('first_name') ? ' has-error': ''}}">
                <label class="col-md-3 col-md-offset-1 control-label">First Name</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="first_name" value="{{ $errors->has('first_name') ? old('first_name') : $user->first_name }}">

                  @if ($errors->has('first_name'))
                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                  @endif
                </div>
              </div>

              <!-- Last Name -->
              <div class="form-group{{ $errors->has('last_name') ? ' has-error': ''}}">
                <label class="col-md-3 col-md-offset-1 control-label">Last Name</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="last_name" value="{{ $errors->has('last_name') ? old('last_name') : $user->last_name }}">

                  @if ($errors->has('last_name'))
                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                  @endif
                </div>
              </div>

              <!-- Submit Button -->
              <div class="form-group">
                <div class="col-md-4 col-md-offset-8">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          @endif

      </div>
    </div>
  </div>
@endsection