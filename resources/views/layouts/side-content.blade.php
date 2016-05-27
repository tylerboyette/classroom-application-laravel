<div class="well">
  <h4>Courses</h4>
  @if (Auth::user()->courses()->get())
    <div class="list-group">
      @foreach (Auth::user()->courses()->get() as $course)
        <a href="course/{{ $course->id }}" class="list-group-item list-group-item-info">
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
  <p>Currently you have no messages.</p>
</div>