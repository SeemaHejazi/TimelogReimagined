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
            <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                <a class="nav-link" href="/login">Log in</a>
            </li>
        </ul>
    </div>
</nav>