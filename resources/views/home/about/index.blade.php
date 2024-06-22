@extends('layouts.app')
@section('title', 'Club Sierra Dorada Sobre Nosotros')
@section('content')

  <div>
    <div class="my-vh-100">
      <!-- Navbar -->
      @include('subviews.navbarOther')
      <div class="pt-4 pb-4 d-flex flex-column">
        <div class="container-fluid p-0 mb-3 sections-arrow-title px-3">
          <a href="{{ route('home.landing') }}" class="btn btn-primary bg-gold b-gold mb-3">
            <i class="fas fa-arrow-left"></i>
          </a>
          <h2 class="my-title-letter my-section-title text-center container-fluid">NOSOTROS</h2>
        </div>
        <div class="relative">
          <div class="my-row px-3 bg-gold-light">
            <div class="image-container-about">
              <img src="{{ asset('images/alejandra.jpg') }}" alt="Alejandra Correa" class="about-image">
              <p class="image-caption bold">*Alejandra Correa, nuestra directora</p>
            </div>
            <div class="about-text-container color-black">
              <div class="about-text">
                <p class="my-section-subtitle about-title text-center">
                  Nuestra Historia
                </p>
                <p class="color-black justify">El club de chalanería <strong>Sierra Dorada</strong>, es una empresa
                  netamente <strong>familiar</strong> la cual nació en
                  el año 2015, y que durante este tiempo se ha dedicado a la crianza del <strong>caballo criollo
                    colombiano</strong>, al manejo
                  y conducción de dichos ejemplares; pero sobre todo a destacarse por ser una de las <strong>mejores
                    escuelas de
                    equitación</strong>, teniendo un nivel de competencia muy alto, el cual le permite llamar la atención
                  dentro de todo
                  el territorio nacional.</p>
              </div>
            </div>
          </div>

          <div class="my-row px-3 reverse">
            <div class="about-text-container color-black">
              <div class="about-text">
                <p class="my-section-subtitle about-title text-center">
                  Nuestros Valores
                </p>
                <ul>
                  <li>Unión</li>
                  <li>Amor</li>
                  <li>Pasión</li>
                  <li>Respeto</li>
                  <li>Disciplina</li>
                  <li>Tolerancia</li>
                  <li>Sentido de pertenencia</li>
                </ul>
              </div>
            </div>
            <div class="image-container-about">
              <img src="{{ asset('images/estudiante.jpeg') }}" alt="Sierra dorada" class="about-image">
            </div>
          </div>

          <div class="my-row px-3 bg-gold-light">
            <div class="image-container-about">
              <img src="{{ asset('images/podio.jpg') }}" alt="Sierra dorada" class="about-image">
            </div>
            <div class="about-text-container color-black">
              <div class="about-text">
                <p class="my-section-subtitle about-title text-center">
                  Nuestra Misión
                </p>
                <p class="color-black justify">Promover la <strong>chalanería</strong> como un deporte, que forma
                  <strong>jinetes<strong> y </strong>amazonas</strong> íntegros
                  teniendo como base principal el <strong>respeto</strong> y <strong>amor</strong> por nuestro
                  <strong>caballo criollo colombiano.</strong>
                </p>
              </div>
            </div>
          </div>

          <div class="my-row px-3 reverse">
            <div class="about-text-container color-black">
              <div class="about-text">
                <p class="my-section-subtitle about-title text-center">
                  Nuestra Visión
                </p>
                <p class="color-black justify">Ser una de las mejores <strong>escuelas de chalanería</strong> a nivel
                  nacional logrando
                  fomentar este <strong>deporte</strong> y enaltecer el <strong>caballo criollo colombiano.</strong></p>
              </div>
            </div>
            <div class="image-container-about">
              <img src="{{ asset('images/estudiante2.jpg') }}" alt="Sierra dorada" class="about-image">
            </div>
          </div>

          <div class="yellow-line"></div>

        </div>
      </div>
    </div>
    @include('subviews.footer')
  </div>
@endsection
