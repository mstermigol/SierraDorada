<nav class="navbar navbar-expand-md mt-0 mx-2 mx-sm-5">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="{{ route('home.landing') }}">
      <img src="{{ asset('images/logo-sierra-nb.webp') }}" alt="Club Sierra Dorada" width="120">

    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Alternar navegación">
      <span class="fas fa-bars fa-2x" data-bs-toggle="collapse" data-bs-target="#navbarNav"></span>

    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="navbar-item">
          <a class="nav-link mx-lg-4 mx-md-3 mx-sm-1 my-subtitle-letter @if (Request::segment(1) == '#') active @endif"
            href="{{ route('home.about.index') }}">Nosotros</a>
        </li>
        <li class="navbar-item">
          <a class="nav-link mx-lg-4 mx-md-2 mx-sm-1 my-subtitle-letter @if (Request::segment(1) == '#') active @endif"
            href="{{ route('home.service.index') }}">Servicios</a>
        </li>
        <li class="navbar-item">
          <a class="nav-link mx-lg-4 mx-md-2 mx-sm-1 my-subtitle-letter @if (Request::segment(1) == '#') active @endif"
            href="{{ route('home.event.index') }}">Eventos</a>
        </li>
        <li class="navbar-item">
          <a class="nav-link mx-lg-4 mx-md-2 mx-sm-1 my-subtitle-letter @if (Request::segment(1) == '#4') active @endif"
          href="{{ route('home.horse.index') }}">Caballos</a>
        </li>
        <li class="navbar-item">
          <a class="nav-link mx-lg-4 mx-md-2 mx-sm-1 my-subtitle-letter @if (Request::segment(1) == '#5') active @endif"
            href="{{ route('home.gallery.index') }}">Galerias</a>
        </li>
      </ul>
    </div>

  </div>
</nav>
