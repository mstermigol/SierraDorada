@extends('layouts.app')
@section('title', 'Club de Chalanería Sierra Dorada | Equitación, Competición y Equinoterapia')
@push('head')
  <meta name="description"
    content="Somos un club de chalanería para adultos y niños ubicado en el municipio de La Estrella. Nos dedicamos a fomentar el amor y respeto por los caballos." />

  <!-- Diferir la carga de CSS no crítico -->
  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" as="style" onload="this.rel='stylesheet'">
  <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" as="style" onload="this.rel='stylesheet'">

@endpush

@section('content')
  <!-- Hero section -->
  @include('subviews.landing.hero')

  <!-- Services section -->
  @include('subviews.landing.services')

  <!-- Teachers section -->
  @include('subviews.landing.teachers')

  <!-- Testimonies section -->
  @include('subviews.landing.testimonies')

  <!-- Sportsman section -->
  @include('subviews.landing.sportsman')

  <!-- Allies section -->
  @include('subviews.landing.allies')

  <!-- Footer section -->
  @include('subviews.footer')

  <!-- Scripts al final del body -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" defer crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
