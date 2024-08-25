@extends('layouts.app')
@section('title', 'Club de Chalanería Sierra Dorada | Equitación, Competición y Equinoterapia')
@push('head')
  <meta name="description"
    content="Somos un club de chalanería para adultos y niños ubicado en el municipio de La Estrella. Nos dedicamos a fomentar el amor y respeto por los caballos." />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Owl Carousel Theme CSS -->
      <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<!-- Owl Carousel js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
