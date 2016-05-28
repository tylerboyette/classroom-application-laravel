<div id="forms">
  <div id="assignment-form">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/assignment') }}">
      {{ csrf_field() }}

      <!-- Title -->
      <div class="form-group{{ $errors->has('title') ? ' has-error': ''}}">
        <label class="col-md-3 col-md-offset-1 control-label">Title</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Quiz #1">

          @if ($errors->has('title'))
            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
          @endif
        </div>
      </div>

      <!-- Description -->
      <div class="form-group{{ $errors->has('description') ? ' has-error': ''}}">
        <label class="col-md-3 col-md-offset-1 control-label">Description</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Chapter 1 Assignment">

          @if ($errors->has('description'))
            <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
          @endif
        </div>
      </div>

      <!-- Due Date -->
      <div class="form-group{{ $errors->has('due_date') ? ' has-error': ''}}">
        <label class="col-md-3 col-md-offset-1 control-label">Description</label>
        <div class="col-md-6">
          <input type="datetime-local" class="form-control" name="due_date" value="{{ old('due_date') }}">

          @if ($errors->has('due_date'))
            <span class="help-block"><strong>{{ $errors->first('due_date') }}</strong></span>
          @endif
        </div>
      </div>

      <!-- Submit Button -->
      <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>

    </form>
  </div>
</div>