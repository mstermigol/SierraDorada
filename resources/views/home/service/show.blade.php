@extends('layouts.app')
@section('title', "{$viewData['service']->getName()} | Club Sierra Dorada")
@push('head')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Owl Carousel Theme CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<!-- Owl Carousel js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <div>
    <div class="my-vh-100">
      <!-- Navbar -->
      @include('subviews.navbarOther')

      <div class="px-3 pt-4 pb-4 flex-grow-1">
        <!-- Service title -->
        <div class="container-fluid p-0 mb-3 sections-arrow-title">
          <a href="{{ route('home.service.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras">
            <i class="fas fa-arrow-left"></i>
          </a>
          <h2 class="my-title-letter my-section-title text-center container-fluid">{{ $viewData['service']->getName() }}
          </h2>
        </div>
        <!-- Service show -->
        <div class="show-container mx-auto mx-5 mb-5">
          <p>{{ $viewData['service']->getDescription() }}</p>
          @if ($viewData['service']->getPriceWeekday())
            <p><strong>Precio mensual en semana:</strong> ${{ $viewData['service']->getPriceWeekday() }}</p>
          @endif

          @if ($viewData['service']->getPriceWeekend())
            <p><strong>Precio mensual en fin de semana:</strong> ${{ $viewData['service']->getPriceWeekend() }}</p>
          @endif

          <!-- Button -->
          <div class="mt-2">
            <a href="https://wa.me/3017355436?text=%C2%A1Hola%21%20Estoy%20interesad%40%20en%20el%20servicio%20de%20{{ urlencode($viewData['service']->getName()) }}"
              class="btn btn-wine border-10">
              <p class="text-white m-0 p-0">Inscríbete</p>
            </a>
          </div>
        </div>
        <!-- Carousel -->
        @if (!empty($viewData['service']->getImages()))
          <div class="owl-carousel owl-theme">
            @foreach ($viewData['service']->getImages() as $image)
              <div class="item-show">
                <img src="{{ asset('storage/services/' . $viewData['service']->getName() . '/images/' . $image) }}"
                  class="image-auto">
              </div>
            @endforeach
          </div>
        @endif


      </div>
    </div>
    @include('subviews.footer')
  </div>
  <script src="{{ asset('/js/carouselShow.js') }}"></script>

@endsection
