@extends('layouts.app')
@section('title', 'Club Sierra Dorada Servicios')
@section('content')
  <div>
    <div class="my-vh-100">
      <!-- Navbar -->
      @include('subviews.navbarOther')

      <div class="px-3 pt-4 pb-4 flex-grow-1">
        <!-- Service title -->
        <div class="container-fluid p-0 mb-3 sections-arrow-title">
          <a href="{{ route('home.service.index') }}" class="btn btn-primary bg-gold b-gold mb-3">
            <i class="fas fa-arrow-left"></i>
          </a>
          <h2 class="my-title-letter my-section-title text-center container-fluid">{{ $viewData['service']->getName() }}
          </h2>
        </div>
        <!-- Service show -->
        <div class="show-container mx-auto mx-5 mb-5">
          <p>{{ $viewData['service']->getDescription() }}</p>
          <p><strong>Precio:</strong> ${{ $viewData['service']->getPrice() }} mensuales</p>
          <!-- Button -->
          <div class="mt-2">
            <a href="#" class="btn btn-wine border-10">
              <p class="text-white m-0 p-0">Inscribete</p>
            </a>
          </div>
        </div>
        <!-- Carousel -->
        <div class="owl-carousel owl-theme">
          @foreach ($viewData['service']->getImages() as $image)
            <div class="item-show"><img src="{{ asset('storage/services/' . $viewData['service']->getName().'/images/'.$image) }}" class="image-auto"></div>
          @endforeach
        </div>


      </div>
    </div>
    @include('subviews.footer')
  </div>
  <script src="{{ asset('/js/carouselShow.js') }}"></script>

@endsection
