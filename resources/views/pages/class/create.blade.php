@extends('layouts.app')

@section('title', 'Add Class')

@section('page-header', 'Add New Class')

@section('content')
  <div class="panel panel-info">
    <div class="panel-heading">
      Add a new class below
    </div>
    <div class="panel-body">
      <div class="col-md-12">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/class/create') }}">
          {{ csrf_field() }}

          <!-- Subject -->
          <div class="form-group{{ $errors->has('subject') ? ' has-error': '' }}">
            <label class="col-md-3 control-label">Subject</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="subject" value={{ old('subject') }}>

              @if ($errors->has('subject'))
                <span class="help-block"><strong>{{ $errors->first('subject') }}</strong></span>
              @endif
            </div>
          </div>

          <!-- Title -->
          <div class="form-group{{ $errors->has('title') ? ' has-error': '' }}">
            <label class="col-md-3 control-label">Title</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="title" value={{ old('title') }}>

              @if ($errors->has('title'))
                <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
              @endif
            </div>
          </div>

          <!-- Course Number -->
          <div class="form-group{{ $errors->has('course') ? ' has-error': '' }}">
            <label class="col-md-3 control-label">Course Number</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="course" value={{ old('course') }}>

              @if ($errors->has('course'))
                <span class="help-block"><strong>{{ $errors->first('course') }}</strong></span>
              @endif
            </div>
          </div>

          <!-- Section -->
          <div class="form-group{{ $errors->has('section') ? ' has-error': '' }}">
            <label class="col-md-3 control-label">Section</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="section" value={{ old('section') }}>

              @if ($errors->has('section'))
                <span class="help-block"><strong>{{ $errors->first('section') }}</strong></span>
              @endif
            </div>
          </div>

          <!-- Submit Button -->
          <div class="form-group">
            <div class="col-md-4 col-md-offset-7">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  
@endsection