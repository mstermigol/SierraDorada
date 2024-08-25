<footer class="container-fluid pt-5 pb-3" id="footer">
  <!-- Location -->
  <a href="https://www.google.com/maps/dir//Club+de+Equitaci%C3%B3n+Sierra+Dorada,+Cl.+81+Sur+%2365+215+int+136,+Casa+Jardin,+La+Estrella,+Antioquia/@6.1575043,-75.6498807,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x8e46810d95628faf:0x835b122a6c8d3d6d!2m2!1d-75.6498807!2d6.1575043?entry=ttu"
    class="direction">
    <i class="fas fa-map-marker-alt icon"></i>
    Casa Jardin, La Estrella, Antioquia
  </a>

  <!-- Media -->
  <div class="media-container mt-4 mb-3">
    <a href="https://www.instagram.com/sierradorada_club/?hl=es" target="_blank">
      <img src="{{ url('images/instagram.png') }}" alt="Instagram" class="media">
    </a>
    <a href="https://www.facebook.com/clubsierradorada" target="_blank">
      <img src="{{ url('images/facebook.png') }}" alt="Facebook" class="media">
    </a>
    <a href="https://www.tiktok.com/@sierradorada_club1" target="_blank">
      <img src="{{ url('images/tiktok.png') }}" alt="Tiktok" class="media">
    </a>
  </div>

  <!-- Divider -->
  <img src="{{ url('images/divider.webp') }}" alt="Divider" class="divider">

  <!-- Links -->
  <div class="links-container mt-2 mb-3">
    <a href="{{ route('home.about.index') }}" class="my-subtitle-letter link nav-link">Nosotros</a>
    <a href="{{ route('home.service.index') }}" class="my-subtitle-letter link nav-link">Servicios</a>
    <a href="{{ route('home.event.index') }}" class="my-subtitle-letter link nav-link">Eventos</a>
    <a href="{{ route('home.horse.index') }}" class="my-subtitle-letter link nav-link">Caballos</a>
    <a href="{{ route('home.gallery.index') }}" class="my-subtitle-letter link nav-link last-link">Galeria</a>
  </div>



</footer>
