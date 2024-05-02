<section class="container-fluid pt-4 pb-3 relative"id="teachers-section">
    <!-- Title -->
    <h3 class="my-subtitle-letter my-section-subtitle text-center" id="teachers-subtitle">CONOCE A NUESTROS</h3>
    <h2 class="my-title-letter my-section-title text-center mb-5" id="teachers-title">PROFESORES</h2>

    <!-- Teacher Container -->
    <div class="owl-carousel owl-theme">
        <div class="item">
            <div class="teacher-container text-center">
                <img src="{{ url('images/hero-sierra.jpg') }}" class="image-circle" alt="Circle Image">
                <p class="teacher-name text-dark mt-4 my-subtitle-letter my-section-subtitle teacher-name-spacing">Camilo Garcia Arbeláez</p>
            </div>
        </div>

        <div class="item">
            <div class="teacher-container text-center">
                <img src="{{ url('images/hero-sierra.jpg') }}" class="image-circle" alt="Circle Image">
                <p class="teacher-name text-dark mt-4 my-subtitle-letter my-section-subtitle teacher-name-spacing">Paula Rueda Uzuga</p>
            </div>
        </div>

        <div class="item">
            <div class="teacher-container text-center">
                <img src="{{ url('images/hero-sierra.jpg') }}" class="image-circle" alt="Circle Image">
                <p class="teacher-name text-dark mt-4 my-subtitle-letter my-section-subtitle teacher-name-spacing">Camila Henao Correa</p>
            </div>
        </div>
    </div>

    <!-- Quote -->
    <div class="container-fluid d-flex justify-content-center mt-5 mb-4">
        <p class="color-gold quote">“Construyendo sueños al lomo del caballo”</p>
    </div>


    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                
                autoplay: true,
                pagination: false,
                center: true,
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }

                }
                
                
            })
        }
        );
    </script>

</section>