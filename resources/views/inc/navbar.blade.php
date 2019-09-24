<nav class="navbar navbar-expand-sm navbar-inverse">
    <a class="navbar-brand" href="/">
        <img src="https://s3.amazonaws.com/himama2/images/horizontal-logo.png"
             class="logo-img"
             alt="HiMama - the daycare app for teachers, parents and directors">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/">Clocking in/out</a>
            </li>
            @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link logout" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Log out</a>
                </li>

            @else
                <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
                </li>
            @endif
        </ul>
        <form id="logout-form"
              action="{{ route('logout') }}"
              method="POST"
              style="display: none;">
            @csrf
        </form>
    </div>
</nav>