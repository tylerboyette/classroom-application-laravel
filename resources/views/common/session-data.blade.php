<!-- Display flashed session data on successful action -->
@if (session('status'))
  <div class="alert alert-success alert-dismissable" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{ session('status') }}
  </div>
@endif