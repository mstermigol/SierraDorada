@extends('layouts.app')
@section('title', 'Club Sierra Dorada Caballos')
@section('content')
  <div>
    <div class="my-vh-100">
      <!-- Navbar -->
      @include('subviews.navbarOther')
      <div class=" px-3 pt-4">
        <div class="container-fluid p-0 mb-3 sections-arrow-title">
          <a href="{{ route('home.landing') }}" class="btn btn-primary bg-gold b-gold mb-3">
            <i class="fas fa-arrow-left"></i>
          </a>
          <h2 class="my-title-letter my-section-title text-center container-fluid">CABALLOS</h2>
        </div>
        <div class="row g-4 mb-4 justify-content-center">
          @foreach ($viewData['horses'] as $horse)
            <div class="col-md-4 col-lg-3 ">
              <div class="arch border-gold border-15 mx-auto">
                <img src="{{ asset('storage/horses/'.$horse->getImage()) }}" alt="{{ $horse->getName() }}">
                <p class="d-block color-white bg-gold border-10 text-center p-1 mt-3 mb-2">{{ $horse->getName() }}</p>
                <p class="color-black m-0 text-center">{{ $horse->getDescription() }}</p>
              </div>
            </div>
          @endforeach
        </div>



      </div>
    </div>
    @include('subviews.footer')
  </div>

@endsection
