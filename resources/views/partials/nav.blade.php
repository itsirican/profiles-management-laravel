<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('home')}}">LOGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @guest
        <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}">Home</a>
        </li>
      @endguest
      <li class="nav-item">
        <a class="nav-link" href="{{route('profiles.index')}}">Profiles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('settings.index')}}">Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('profile.create')}}">Add Profile</a>
      </li>
      @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('login.show')}}">Login</a>
        </li>
      @endguest
      @auth
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="{{route('login.logout')}}">Logout</a>
          </div>
        </div>
        <li class="nav-item">

        </li>
      @endauth
    </ul>
  </div>
</nav>