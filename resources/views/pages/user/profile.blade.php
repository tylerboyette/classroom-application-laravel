@extends('layouts.app')

@section('title', 'Profile')

@section('page-header', 'General Account Information')

@section('content')
  <div class="panel panel-info">
    <div class="panel-heading">Your profile's information, {{ Auth::user()->first_name }}</div>
    <div class="panel-body">

      <!-- Display flashed session data on successfull or failed update -->
      @if (session('status'))
        <div class="alert alert-success alert-dismissable" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</button>
          {{ session('status') }}
        </div>
      @endif

      <p><strong>First name:</strong> {{ Auth::user()->first_name }}</p>
      <p><strong>Last name:</strong> {{ Auth::user()->last_name }}</p>
      <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
      <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
      <p><strong>Created at:</strong> {{ Auth::user()->created_at }}</p>
      <p><strong>Updated at:</strong> {{ Auth::user()->updated_at }}</p>

      <div class="col-xs-12 col-md-12">
        <div class="col-md-10">
          <div class="collapse" id="edit-collapse">
            <div class="well">
              <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/update') }}">
                {{ csrf_field() }}

                <!-- First Name -->
                <div class="form-group{{ $errors->has('first_name') ? ' has-error': '' }}">
                  <label class="col-md-3 control-label">First Name</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="first_name" value="{{ $errors->has('first_name') ? old('first_name') : Auth::user()->first_name }}">

                    @if ($errors->has('first_name'))
                      <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                    @endif
                  </div>
                </div>

                <!-- Last Name -->
                <div class="form-group{{ $errors->has('last_name') ? ' has-error': '' }}">
                  <label class="col-md-3 control-label">Last Name</label>
                  <div class="col-md-8">
                    <input type="text" class="form-control" name="last_name" value="{{ $errors->has('last_name') ? old('last_name') : Auth::user()->last_name }}">

                    @if ($errors->has('last_name'))
                      <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                    @endif
                  </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                  <div class="col-md-4 col-md-offset-8">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <a class="btn btn-primary" role="button" data-toggle="collapse" href="#edit-collapse" aria-expanded="false" aria-controls="edit-collapse">Edit Profile</a>
        </div>
      </div>
    </div>
  </div>
@endsection