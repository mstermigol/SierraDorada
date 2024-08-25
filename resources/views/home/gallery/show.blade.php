@extends('layouts.app')
@section('title', "{$viewData['gallery']->getName()} | Club Sierra Dorada")
@section('content')
  <div>
    <div class="my-vh-100">
      @include('subviews.navbarOther')
      <div class="container-fluid p-0 mb-3 mt-4 mx-4 sections-arrow-title">
        <a href="{{ route('home.gallery.index') }}" class="btn btn-primary bg-gold b-gold mb-3">
          <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="my-title-letter my-section-title text-center container-fluid">{{ $viewData['gallery']->getName() }}
        </h2>
      </div>
      <div class="p-4">
        @if (!empty($viewData['gallery']->getImages()))
          <div class="masonry-container">
            @foreach ($viewData['gallery']->getImages() as $image)
              <a class="masonry-item" target="_blank" href="{{ asset('storage/galleries/' . $viewData['gallery']->getName() . '/' . $image) }}">
                <img src="{{ asset('storage/galleries/' . $viewData['gallery']->getName() . '/' . $image) }}" loading="lazy"
                  alt="Image">
              </a>
            @endforeach
          </div>
        @else
          <div>
            <p class="color-black text-center">No hay imágenes disponibles.</p>
          </div>
        @endif
      </div>

    </div>
    @include('subviews.footer')
  </div>

@endsection
