<section class="container-fluid pt-4 px-0 relative" id="teachers-section">
    <!-- Title -->
    <h3 class="my-subtitle-letter my-section-subtitle text-center" id="teachers-subtitle">CONOCE A NUESTROS</h3>
    <h2 class="my-title-letter my-section-title text-center mb-5" id="teachers-title">PROFESORES</h2>

    <!-- Teacher Container -->
    <div class="owl-carousel owl-theme">
        @foreach ($viewData['teachers'] as $teacher)
            <div class="item">
                <div class="teacher-container text-center">
                    <img src="{{ asset('storage/teachers/' . $teacher->getImage()) }}" class="image-circle" alt="{{ $teacher->getName() }}">
                    <p class="teacher-name text-dark mt-4 my-subtitle-letter my-section-subtitle teacher-name-spacing">{{ $teacher->getName() }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Quote -->
    <div class="container-fluid d-flex justify-content-center mt-5">
        <p class="color-gold quote">“Construyendo sueños al lomo del caballo”</p>
    </div>
</section>
