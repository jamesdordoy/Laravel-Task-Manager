<nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbardiv">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand">Task Manager</a>
    </div>

    <div class="collapse navbar-collapse" id="navbardiv">
      <ul class="nav navbar-nav">
        <li><a href="/">View Tasks</a></li>
        <li><a href="/add">Add Task</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
          <li>
            <a class="dropdown-item"
              href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="glyphicon glyphicon-log-in"></span> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        @else
          <li><a href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        @endif
        <li><a href="/contact">Contact</a></li>
        
      </ul>
    </div>
  </div>
</nav>