<div class="well">
  <h4>Courses</h4>
  @if (count(Auth::user()->courses()->get()) > 0)
    <div class="list-group">
      @foreach (Auth::user()->courses()->get() as $course)
        <a href="{{ url('course/' . $course->id) }}" class="list-group-item list-group-item-info">
          <h4 class="list-group-item-heading">
            {{ $course->subject }} {{ $course->course }}-{{ $course->section }}
          </h4>
          <p class="list-group-item-text">{{ $course->title }}</p>
        </a>
      @endforeach
    </div>
  @else
    @if (Auth::user()->role == 'teacher')
      <div class="alert alert-danger" role="alert">You do not have any active courses.</div>
    @else
      <div class="alert alert-danger" role="alert">You are no taking any courses.</div>
    @endif
  @endif
</div>

<div class="well">
  <h4>Messages</h4>
  @if (count(Auth::user()->messages()->where('to', '=', Auth::user()->id)->get()) > 0)
    <div class="list-group">
      @foreach (Auth::user()->messages()->where('to', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get() as $message)
        <a href="{{ url('/message/' . $message->id) }}" class="list-group-item list-group-item-info">
          <h4 class="list-group-item-heading">
            {{ $message->title }}
          </h4>
          <p class="list-group-item-text">{{ $message->message }}</p>
        </a>
      @endforeach
    </div>
  @else
    <div class="alert alert-danger" role="alert=">Currently, you don't have any new messages.</div>
  @endif
</div>

@if (isset($assignments))
  @if (count($assignments) > 0)
    <div class="well">
      <h4>Assignments</h4>
      <div class="list-group">
        @foreach ($assignments as $assignment)
          <a href="{{ url('/course/' . $course_id . '/assignment/' . $assignment->id) }}" class="list-group-item list-group-item-info">
            <h4 class="list-group-item-heading">{{ $assignment->title }}</h4>
            <p class="list-group-item-text">Due Date: <u>{{ date('F jS Y \a\t h:i A', strtotime($assignment->due_date)) }}</u></p>
          </a>
        @endforeach
      </div>
    </div>
  @endif
@endif

