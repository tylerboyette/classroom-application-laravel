<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
        <span class="sr-only">Toggle Navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="{{ url('/') }}"><span class="white">Classroom</span></a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <!-- Left side of navbar -->
      <ul class="nav navbar-nav">
        @if (Auth::user())
          <!-- Display appropriate links based on the user's role -->
          @if (Auth::user()->role == 'teacher')
            <li><a href="{{ url('/class/create') }}">Add Class</a></li>
          @else 
            <li><a href="{{ url('/classes/view') }}">Classes</a></li>
          @endif
          
          <li><a href="{{ url('/profile') }}">Profile</a></li>
          <li><a href="{{ url('/messages') }}">Messages</a></li>
        @endif
      </ul>

      <!-- Right side of navbar -->
      <ul class="nav navbar-nav navbar-right">
        <!-- Authentication links -->
        @if (Auth::guest())
          <li><a href="{{ url('/login') }}">Login</a></li>
          <li><a href="{{ url('/register') }}">Register</a>
        @else
          <li>
            <p class="navbar-text pleft-15">Signed in as 
              <a href="{{ url('/profile') }}" class="white">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>.
            </p>
          </li>
          <li>
            <a href="{{ url('/logout') }}" style="padding: 0; padding-left: 15px;"><button type="button" class="btn btn-default navbar-btn">Logout</button></a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>