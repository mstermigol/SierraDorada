@extends('layouts.app')
@section('title', 'Club de Chalanería Sierra Dorada | Equitación, Competición y Equinoterapia')
@push('head')
  <meta name="description"
    content="Somos un club de chalanería para adultos y niños ubicado en el municipio de La Estrella. Nos dedicamos a fomentar el amor y respeto por los caballos." />
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



@endsection
