
@extends('layouts.app')
@section('title', 'Club Sierra Dorada | Equitación | Chalaneria | Equinoterapia | Eventos')
@section('content')


<!-- Hero section -->
<section id ="hero" class="d-flex align-items-center justify-content-start">
    <div class="position-absolute top-0 container-fluid mt-3 mx-0 px-0">
        @include('subviews.navbar')
    </div>
    
    
    <div class="container-fluid flex-column mx-5 hero-content-margin">

        <h2 class="mb-0 pb-0 my-subtitle-letter">
            CLUB DE CHALANERIA
        </h2>
        <h1 class="my-title-letter mt-0 pt-0 mb-0">
            SIERRA DORADA
        </h1>
        <P id="p-hero">
        Somos un club de chalanería para adultos y niños ubicado en el municipio
        de La Estrella. Nos dedicamos a fomentar el amor y respeto por los caballos.
        </P>
        <button class="btn btn-golden mt-3 mb-5">
            <h2 class="text-white m-0 p-0">Inscríbete</h2>
        </button>

    </div>
</section>

<!-- Services section -->

<section id="services" class="container-fluid d-flex flex-column align-items-center justify-content-center">
    <h2 class="my-subtitle-letter">NUESTROS SERVICIOS</h2>
    <h1 class="my-title-letter">¿Qué ofrecemos?</h1>
    <div class="row d-flex
    justify-content-center">
        <div class="col-12 col
        -md-6 col-lg-4 d-flex flex-column align-items-center justify-content-center">
            <img src="{{ asset('images/equitacion.jpg') }}" alt="Equitación" class="img-fluid rounded-circle">
            <h3 class="my-subtitle-letter">Equitación</h3>
            <p class="text-center">Clases de equitación para niños y adultos. Aprende a montar a caballo con nosotros.</p>
        </div>

        <div class="col-12 col-md-6 col-lg-4 d-flex flex-column align-items-center justify-content-center">
            <img src="{{ asset('images/chalaneria.jpg') }}" alt="Chalanería" class="img-fluid rounded-circle">
            <h3 class="my-subtitle-letter">Chalanería</h3>
            <p class="text-center">Clases de chalanería para niños y adultos. Aprende a cuidar y montar a caballo con nosotros.</p>
        </div>

        <div class="col-12 col-md-6 col-lg-4 d-flex flex-column align-items-center justify-content-center">
            <img src="{{ asset('images/equinoterapia.jpg') }}" alt="Equinoterapia" class="img-fluid rounded-circle">
            <h3 class="my-subtitle-letter">Equinoterapia</h3>
            <p class="text-center">Terapia asistida con caballos para niños y adultos. Mejora tu calidad de vida con nosotros.</p>

        </div>

    </div>
</section>

@endsection