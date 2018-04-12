<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-custom fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/">TacSource</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/user">Members</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="/about">About/FAQ</a>
        </li> -->
        @if (!Auth::check())
          <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
          </li>
        @else
          <li class="nav-item">
              <a class="nav-link" href="/event">Events</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/user/{{Auth::user()->id}}">Account</a>
          </li>
          @if(Auth::user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link" href="/admin">Officer</a>
            </li>
          @endif
          <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
