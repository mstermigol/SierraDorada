@extends('layouts.admin')

@section('title', 'Admin - Ver Galería')
@section('section-title', 'Galerías')

@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras">
      <i class="fas fa-arrow-left"></i>
    </a>
  </div>

  <div class="d-flex flex-column mx-auto max-200-ch">
    <p class="bold color-black">Nombre de la Galería</p>
    <p class="color-black">{{ $viewData['gallery']->getName() }}</p>

    <p class="bold color-black">Imágenes</p>
  </div>

  <div class="container d-flex flex-column">
    @if (!empty($viewData['gallery']->getImages()))
      <div id="gallery" class="d-flex flex-wrap"></div>
      <div id="pagination-controls" class="container-fluid d-flex justify-content-center mb-3">
        <button id="prevPage" class="btn btn-primary bg-gold b-gold mx-3"><i class="fas fa-arrow-left"></i>
          Anterior</button>
        <button id="nextPage" class="btn btn-primary bg-gold b-gold mx-3">Siguiente <i
            class="fas fa-arrow-right"></i></button>
      </div>
      <p id="noImagesMessage" class="color-black text-center d-none">No hay imágenes disponibles.</p>
      <div id="galleryData" data-images='@json($viewData['gallery']->getImages())'
        data-folder-path="{{ asset('storage/' . $viewData['folderPath']) }}"></div>
    @else
      <p class="color-black text-center">No hay imágenes disponibles.</p>
    @endif
  </div>
  <script src="{{ asset('/js/galleryPagination.js') }}"></script>
@endsection
