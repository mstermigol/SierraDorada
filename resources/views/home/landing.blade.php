
@extends('layouts.app')
@section('title', 'Club Sierra Dorada | Equitación | Chalaneria | Equinoterapia | Eventos')
@section('content')


<!-- Hero section -->
<section id ="hero"class="d-flex align-items-center justify-content-start">
    <div class="position-absolute top-0 container-fluid">
        @include('subviews.navbar')
    </div>
    
    <div class="container-fluid flex-column">

        
    <h2>
        CLUB DE CHALANERIA
    </h2>
    <h1>
        SIERRA DORADA
    </h1>
    <P id="p-hero">
    Somos un club de chalanería para adultos y niños ubicado en el municipio
     de La Estrella. Nos dedicamos a fomentar el amor y respeto por los caballos.
    </P>

    </div>
</section>

<!-- About section -->
<section id="about" class="d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('img/about.jpg') }}" class="img-fluid" alt="About us">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h2>
                    SOBRE NOSOTROS
                </h2>
                <p>
                    Somos un club de chalanería para adultos y niños ubicado en el municipio de La Estrella. Nos dedicamos a fomentar el amor y respeto por los caballos.
                </p>
                <p>
                    Ofrecemos clases de equitación, chalanería y equinoterapia. También organizamos eventos y actividades para toda la familia.
                </p>
                <a href="#0" class="btn btn-primary">Leer más</a>
            </div>
        </div>
    </div>
</section>

@endsection