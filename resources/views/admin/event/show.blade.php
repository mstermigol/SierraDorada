@extends('layouts.admin')

@section('title', 'Admin - Ver Evento')
@section('section-title', 'Eventos')

@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.event.index') }}" class="btn btn-primary bg-gold b-gold mb-3">
      <i class="fas fa-arrow-left"></i>
    </a>
  </div>

  <div class="d-flex flex-column mx-auto max-200-ch">
    <p class="bold color-black">Titulo del Evento</p>
    <p class="color-black">{{ $viewData['event']->getTitle() }}</p>
    <p class="bold color-black">Descripción Miniatura</p>
    <p class="color-black">{{ $viewData['event']->getDescriptionMiniature() }}</p>
    <p class="bold color-black">Imagen miniatura</p>
    <img src="{{ asset('storage/' . $viewData['miniature']. $viewData['event']->getImageMiniature()) }}" alt="{{ $viewData['event']->getTitle() }}">
    <p class="bold color-black">Descripción</p>
    <p class="color-black">{{ $viewData['event']->getDescription() }}</p>
    <p class="bold color-black">Imagenes</p>
  </div>

  <div class="container d-flex flex-column">
    @if (!empty($viewData['event']->getImages()))
      <div id="gallery" class="d-flex flex-wrap"></div>
      <div id="pagination-controls" class="container-fluid d-flex justify-content-center mb-3">
        <button id="prevPage" class="btn btn-primary bg-gold b-gold mx-3"><i class="fas fa-arrow-left"></i>
          Anterior</button>
        <button id="nextPage" class="btn btn-primary bg-gold b-gold mx-3">Siguiente <i
            class="fas fa-arrow-right"></i></button>
      </div>
      <p id="noImagesMessage" class="color-black text-center d-none">No hay imágenes disponibles.</p>
      <div id="galleryData" data-images='@json($viewData['event']->getImages())'
        data-folder-path="{{ asset('storage/' . $viewData['images']) }}"></div>
    @else
      <p class="color-black text-center">No hay imágenes disponibles.</p>
    @endif
  </div>
  <script src="{{ asset('/js/galleryPagination.js') }}"></script>
@endsection



