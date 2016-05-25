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

      <a class="navbar-brand" href="{{ url('/') }}">Classroom</a>
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
      <!-- Left side of navbar -->
      <ul class="nav navbar-nav">
        <li><a href="{{ url('/home') }}">Home</a></li>
      </ul>

      <!-- Right side of navbar -->
      <ul class="nav navbar-nav navbar-right">
        <!-- Authentication links -->
        @if (Auth::guest())
          <li><a href="{{ url('/login') }}">Login</a></li>
          <li><a href="{{ url('/register') }}">Register</a>
        @else
          <li>
            <p class="navbar-text">Signed in as 
              <a href="{{ url('/profile') }}" class="white">
                <strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong>
              </a>
            </p>
          </li>
          <li>
            <a href="#" class="padding-none" style="padding:0;"><button type="button" class="btn btn-default navbar-btn">Logout</button></a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>