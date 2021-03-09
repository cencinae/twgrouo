<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="/publications">Publicaciones <span class="sr-only">(current)</span></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-user"></i></a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default">
          <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Christian</a>
        </div>
      </li>
    </ul>

  </div>
</nav>