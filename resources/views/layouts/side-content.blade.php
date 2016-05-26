<div class="well">
  <h4>Courses</h4>
  @if (Auth::user()->role == 'teacher')
    <p>Currently, you do not have any classes.</p>
  @else
    <p>You are not currently taking any courses.</p>
  @endif
</div>

<div class="well">
  <h4>Messages</h4>
  <p>Currently you have no messages.</p>
</div>