@extends('layouts.app')
@section('title', "{$viewData['event']->getTitle()} | Club Sierra Dorada")
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
        <!-- Event title -->
        <div class="container-fluid p-0 mb-3 sections-arrow-title">
          <a href="{{ route('home.event.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras">
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
            <div class="item-show"><img
                src="{{ asset('storage/events/' . $viewData['event']->getTitle() . '/images/' . $image) }}"
                class="image-auto"></div>
          @endforeach
        </div>


      </div>
    </div>
    @include('subviews.footer')
  </div>
  <script src="{{ asset('/js/carouselShow.js') }}"></script>

@endsection
