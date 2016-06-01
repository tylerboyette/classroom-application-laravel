@extends('layouts.app')

@section('title', 'Message Details')

@section('page-header', 'Message Details')

@section('content')

  @include('common.session-data')

  <div class="col-xs-12 col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          Details About The Message
        </h4>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class="col-md-10">
            <h4>{{ $message->title }} from {{ $from->first_name }} {{ $from->last_name }}</h4>
            <hr>
            <p>{{ $message->message }}</p>
          </div>
          <div class="col-md-2">
            <form role="form" method="POST" action="{{ url('/message/' . $message->id) }}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}

              <button type="submit" class="btn btn-danger btn-block">Delete</div>
            </form>
        </div>

      </div>
    </div>
  </div>
@endsection