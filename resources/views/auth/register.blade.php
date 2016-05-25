@extends('layouts.app2')

@section('title', 'Registration')

@section('content')
  <div class="row">
    <div class="col-xs-12 col-md-8 col-md-offset-2">
      <div class="panel panel-info">
        <div class="panel-heading">
          Register
        </div>

        <div class="panel-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <!-- First Name -->
            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
              <label class="col-md-4 control-label">First Name</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

                @if ($errors->has('first_name'))
                  <span class="help-block"><strong>{{ $errors->first('first_name') }}</span>
                @endif
              </div>
            </div>

            <!-- Last Name -->
            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
              <label class="col-md-4 control-label">Last Name</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">

                @if ($errors->has('last_name'))
                  <span class="help-block"><strong>{{ $errors->first('last_name') }}</span>
                @endif
              </div>
            </div>

            <!-- First Name -->
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label class="col-md-4 control-label">Email</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                  <span class="help-block"><strong>{{ $errors->first('email') }}</span>
                @endif
              </div>
            </div>

            <!-- Password -->
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label class="col-md-4 control-label">Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password" value="{{ old('password') }}">

                @if ($errors->has('password'))
                  <span class="help-block"><strong>{{ $errors->first('password') }}</span>
                @endif
              </div>
            </div>

            <!-- Password Confirmation -->
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label class="col-md-4 control-label">Confirm Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">

                @if ($errors->has('password_confirmation'))
                  <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</span>
                @endif
              </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-user"></i>Register
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection