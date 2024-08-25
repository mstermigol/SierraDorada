    <!-- Service cards -->
    <section class="container-fluid pt-4 pb-3 relative">
      <div class="container">
        <!-- Title -->
        <h2 class="my-subtitle-letter my-section-subtitle text-center">NUESTROS</h2>
        <h2 class="my-title-letter my-section-title text-center mb-5">SERVICIOS</h2>

        <!-- Service cards -->
        <div class="row g-4">
          @foreach ($viewData['services'] as $service)
            <div class="col-md">
              <a href="{{ route('home.service.show', ['slug' => $service->getSlug()]) }}"
                class="card text-decoration-none h-100 my-service-card mx-auto">
                <img
                  src="{{ asset('storage/' . 'services/' . $service->getName() . '/' . $service->getImageMiniature()) }}"
                  class="card-img-top my-service-image" alt="Card Image" height="300">
                <div class="card-body my-service-card-body">
                  <h3 class="card-title my-subtitle-letter bold color-white text-center">{{ $service->getName() }}</h4>
                  <p class="card-text px-3 text-center">{{ $service->getDescriptionMiniature() }}</p>
                </div>
              </a>
            </div>
          @endforeach
        </div>

        <!-- Button -->
        <div class="d-flex justify-content-center mt-4">
          <a href="{{ route('home.service.index') }}" class="btn btn-wine">
            <h2 class="text-white m-0 p-0">Ver más</h2>
          </a>
        </div>

        <!-- Background images -->
        <div class="my-left-horse">
          <img src="{{ url('images/caballo-servicios.webp') }}" alt="Caballo izquierdo">
        </div>
        <div class="my-right-horse">
          <img src="{{ url('images/caballo-servicios.webp') }}" alt="Caballo derecho">
        </div>
      </div>
    </section>
