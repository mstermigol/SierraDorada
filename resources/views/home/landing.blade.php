
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
@endsection