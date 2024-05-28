<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <!-- Main Stye sheet -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css">
  <!-- Bootstrap stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Main Stye sheet -->
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Club Sierra Dorada')</title>
</head>

<body>

  <div id="sidebar" class="my-subtitle-letter">
    <h2>Sierra Dorada</h2>
    <ul>
      <li class="@if (Request::segment(2) == 'galerias') active-sidebar-link @endif"><a href="#">Galerias</a></li>
      <li class="@if (Request::segment(2) == 'eventos') active-sidebar-link @endif"><a href="#">Eventos</a></li>
      <li class="@if (Request::segment(2) == 'usuarios') active-sidebar-link @endif"><a
          href="{{ route('admin.user.index') }}">Usuarios</a></li>
      <li class="@if (Request::segment(2) == 'caballos') active-sidebar-link @endif"><a href="#">Caballos</a></li>
      <li class="@if (Request::segment(2) == 'profesores') active-sidebar-link @endif"><a href="#">Profesores</a></li>
      <li class="@if (Request::segment(2) == 'servicios') active-sidebar-link @endif"><a href="#">Servicios</a></li>
      <li class="@if (Request::segment(2) == 'testimonios') active-sidebar-link @endif"><a href="#">Testimonios</a></li>
      <li>
        <form id="logout" action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="logout-button">Salir <i class="bi bi-box-arrow-right ms-2"></i></button>

        </form>
      </li>
    </ul>


  </div>

  <div id="content">
    <button class="bg-gold navbar-toggler sidebar-toggle" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    @yield('content')
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <!-- Jquery js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Sidebar js -->
  <script src="{{ asset('/js/sidebar.js') }}"></script>

</body>

</html>
