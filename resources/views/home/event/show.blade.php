@extends('layouts.app')
@section('title', 'Club Sierra Dorada Eventos')
@section('content')
  <div>
    <div class="my-vh-100">
      <!-- Navbar -->
      @include('subviews.navbarOther')

      <div class="px-3 pt-4 pb-4 flex-grow-1">
        <!-- Event title -->
        <div class="container-fluid p-0 mb-3 sections-arrow-title">
          <a href="{{ route('home.event.index') }}" class="btn btn-primary bg-gold b-gold mb-3">
            <i class="fas fa-arrow-left"></i>
          </a>
          <h2 class="my-title-letter my-section-title text-center container-fluid">{{ $viewData['event']->getTitle() }}
          </h2>
        </div>
        <!-- Event show -->
        <div class="show-container mx-auto mx-5 mb-5">
          <p>{{ $viewData['event']->getDescription() }}</p>

        </div>
        <!-- Carousel -->
        <div class="owl-carousel owl-theme">
          @foreach ($viewData['event']->getImages() as $image)
            <div class="item-show"><img src="{{ asset('storage/events/' . $viewData['event']->getTitle().'/images/'.$image) }}" class="image-auto"></div>
          @endforeach
        </div>


      </div>
    </div>
    @include('subviews.footer')
  </div>
  <script src="{{ asset('/js/carouselShow.js') }}"></script>

@endsection

