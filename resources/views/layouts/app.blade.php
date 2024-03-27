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
        @yield('content')
        <footer>

        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    </body>

    </html>