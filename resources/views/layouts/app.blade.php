    <!doctype html>
    <html lang="en">

    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <!-- Bootstrap stylesheet -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Main Stye sheet -->
      <link href="{{ asset('/css/app.css') }}?v=1.0.1" rel="stylesheet" />
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <link rel="shortcut icon" href="{{ asset('images/logo-sierra-pag.webp') }}" type="image/x-icon">
      <title>@yield('title', 'Club Sierra Dorada')</title>

      @stack('head')
    </head>

    <body>
      <!-- Jquery js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
      @yield('content')

      <!-- Whatsapp button -->
      @guest
        <div class="fab">
          <a href="https://wa.me/3017355436?text=%C2%A1Hola%21%20Estoy%20interesad%40%20en%20unirme%20a%20la%20familia%20Sierra%20Dorada"
            target="_blank">
            <img src="{{ url('images/whatsapp-fixed.png') }}" alt="WhatsApp Logo">
          </a>
        </div>
      @else
        <div class="fab">
          <a href="{{ route('admin.user.index') }}">
            <img src="{{ url('images/admin.webp') }}" alt="Admin">
          </a>
        </div>

      @endguest

    </body>

    </html>
