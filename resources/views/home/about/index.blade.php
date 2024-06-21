@extends('layouts.app')
@section('title', 'Club Sierra Dorada Sobre Nosotros')
@section('content')

<div>
    <div class="my-vh-100">
        <!-- Navbar -->
        @include('subviews.navbarOther')
        <div class="px-3 pt-4 pb-4 d-flex flex-column">
            <div class="container-fluid p-0 mb-3 sections-arrow-title">
                <a href="{{ route('home.landing') }}" class="btn btn-primary bg-gold b-gold mb-3">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h2 class="my-title-letter my-section-title text-center container-fluid">NOSOTROS</h2>
            </div>
            <div class="row">
                <div class="col-md-6 image-container-about">
                    <img src="{{ asset('images/alejandra.jpg') }}" alt="Alejandra Correa" class="about-image">
                    <p class="image-caption bold">*Alejandra Correa, nuestra directora</p>
                </div>
                <div class="col-md-6 about-text-container color-black">
                    <p class="color-black">El club de chalanería Sierra Dorada, es una empresa netamente familiar la cual nació en el año 2015, y que durante este tiempo se ha dedicado a la crianza del caballo criollo colombiano, al manejo y conducción de dichos ejemplares; pero sobre todo a destacarse por ser una de las mejores escuelas de equitación, teniendo un nivel de competencia muy alto, el cual le permite llamar la atención dentro de todo el territorio nacional.</p>
                </div>
            </div>
        </div>
    </div>
    @include('subviews.footer')
</div>
@endsection
