@if (!empty($viewData['sportsman']) && count($viewData['sportsman']) > 0)
  <!-- Sportsman card -->
  <section class="container-fluid pt-4 pb-3 relative" id="sportsman-section">
    <div class="container">
      <!-- Title -->
      <h2 class="my-subtitle-letter my-section-subtitle text-center">MEJOR DEPORTISTA</h2>
      <h2 class="my-title-letter my-section-title text-center mb-5">DEL MES</h2>

      <!-- Sportsman card -->
      <div class="row g-4">
        @foreach ($viewData['sportsman'] as $sportsman)
          <div class="col-md">
            <div class="card text-decoration-none h-100 my-service-card mx-auto">
              <img src="{{ asset('storage/' . 'sportsman/' . $sportsman->getImage()) }}"
                class="card-img-top my-service-image" alt="Card Image">
              <div class="card-body my-service-card-body">
                <h3 class="card-title my-subtitle-letter bold color-white text-center">
                  {{ $sportsman->getName() }}</h4>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endif
