<!-- Authors: Miguel Jaramillo, Sergio Córdoba and David Fonseca-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main Stye sheet -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />

    <title>@yield('title', 'Club Sierra Dorada')</title>
</head>

<body>
<nav class="navbar navbar-expand-sm mt-3 mx-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sierra</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link mx-lg-4 mx-md-3 mx-sm-1 @if (Request::segment(1) == '') active @endif" href="{{ route('home.index') }}">Nosotros</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link mx-lg-4 mx-md-3 mx-sm-1 @if (Request::segment(1) == '#') active @endif" href="#">Servicios</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link mx-lg-4 mx-md-3 mx-sm-1 @if (Request::segment(1) == '#') active @endif" href="#">Eventos</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link mx-lg-4 mx-md-3 mx-sm-1 @if (Request::segment(1) == '#4') active @endif" href="#4">Caballos</a>
                </li>
                <li class="navbar-item">
                    <a class="nav-link mx-lg-4 mx-md-3 mx-sm-1 @if (Request::segment(1) == '#5') active @endif" href="#5">Galeria</a>
                </li>
            </ul>
        </div>
        
    </div>
</nav>
    @yield('content')
    <footer>

    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
</body>

</html>