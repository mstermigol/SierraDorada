<section class="container-fluid pt-4 pb-3 relative" id="testimonies-section">
    <div class="container">
        <!-- Title -->
        <h2 class="my-subtitle-letter my-section-subtitle text-center">LEE NUESTROS</h2>
        <h2 class="my-title-letter my-section-title text-center mb-5">TESTIMONIOS</h2>

        <!-- Testimonies -->
        <div class="row g-4 mb-4">
            @foreach ($viewData['testimonies'] as $testimony)
                <div class="col">
                    <div class="my-testimony-card text-decoration-none text-center mx-auto">
                        <img src="{{ asset('storage/testimonies/' . $testimony->getImage()) }}" class="my-testimony-image mx-auto d-block" alt="Card Image">
                        <h3 class="my-subtitle-letter bold text-light px-3">{{ $testimony->getName() }}</h3>
                        <p class="px-4 text-light">{{ $testimony->getTestimony() }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
