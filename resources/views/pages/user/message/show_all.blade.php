@extends('layouts.app')

@section('title', 'Messages')

@section('page-header', 'Your Messages')

@section('content')
 <div class="row">
   <div class="panel panel-primary">
     <div class="panel-heading">
       <h4 class="panel-title">
         All Messages
       </h4>
     </div>

     <div class="panel-body">
       @if (isset($messages) && count($messages) > 0)
        @foreach ($messages as $message)
          <div class="well">
            <h4><a href="{{ url('/message/' . $message->id) }}">{{ $message->title }}</a> from <a href="{{ url('/profile/' . $message->from) }}">{{ $message->from_fullname }}</a></h4>
            <hr>
            <p>{{ $message->message }}</p>
          </div>
        @endforeach
       @else
        <div class="alert alert-danger">You don't have any messages at the moment.</div>
       @endif
     </div>
   </div>
 </div>
@endsection