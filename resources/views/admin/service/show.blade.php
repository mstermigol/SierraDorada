@extends('layouts.admin')

@section('title', 'Admin - Ver Servicio')
@section('section-title', 'Servicios')

@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.service.index') }}" class="btn btn-primary bg-gold b-gold mb-3">
      <i class="fas fa-arrow-left"></i>
    </a>
  </div>

  <div class="d-flex flex-column mx-auto max-200-ch">
    <p class="bold color-black">Nombre del Servicio</p>
    <p class="color-black">{{ $viewData['service']->getName() }}</p>
    <p class="bold color-black">Descripción Miniatura</p>
    <p class="color-black">{{ $viewData['service']->getDescriptionMiniature() }}</p>
    <p class="bold color-black">Imagen miniatura</p>
    <img src="{{ asset('storage/' . $viewData['miniature']. $viewData['service']->getImageMiniature()) }}" alt="{{ $viewData['service']->getName() }}">
    <p class="bold color-black">Precio</p>
    <p class="color-black">{{ $viewData['service']->getPrice() }}</p>
    <p class="bold color-black">¿Mostrar en landing?</p>
    <p class="color-black">{{ $viewData['service']->getInLanding() ? 'Sí' : 'No' }}</p>
    <p class="bold color-black">Descripción</p>
    <p class="color-black">{{ $viewData['service']->getDescription() }}</p>
    <p class="bold color-black">Imagenes</p>
    </div>

    <div class="container d-flex flex-column">
        @if (!empty($viewData['service']->getImages()))
            <div id="gallery" class="d-flex flex-wrap"></div>
            <div id="pagination-controls" class="container-fluid d-flex justify-content-center mb-3">
            <button id="prevPage" class="btn btn-primary bg-gold b-gold mx-3"><i class="fas fa-arrow-left"></i>
                Anterior</button>
            <button id="nextPage" class="btn btn-primary bg-gold b-gold mx-3">Siguiente <i
                class="fas fa-arrow-right"></i></button>
            </div>
            <p id="noImagesMessage" class="color-black text-center d-none">No hay imágenes disponibles.</p>
            <div id="galleryData" data-images='@json($viewData['service']->getImages())'
            data-folder-path="{{ asset('storage/' . $viewData['images']) }}"></div>
        @else
            <p class="color-black text-center">No hay imágenes disponibles.</p>
        @endif
    </div>
    <script src="{{ asset('/js/galleryPagination.js') }}"></script>
@endsection



