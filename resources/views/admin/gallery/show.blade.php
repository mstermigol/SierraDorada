@extends('layouts.admin')

@section('title', 'Admin - Ver Galería')
@section('section-title', 'Galerías')

@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-primary bg-gold b-gold mb-3"><i
        class="fas fa-arrow-left"></i></a>
  </div>

  <div class="d-flex flex-column mx-auto max-200-ch">
    <p class="bold color-black">Nombre de la Galería</p>
    <p class="color-black">{{ $viewData['gallery']->getName() }}</p>

    <p class="bold color-black">Imágenes</p>
  </div>
  @if (!empty($viewData['gallery']->getImages()))
    <div class="row">
      @foreach ($viewData['gallery']->getImages() as $image)
        <div class="col">
          <img src="{{ asset('storage/' . $viewData['folderPath'] . $image) }}" alt="Image" class="image-index">
        </div>
      @endforeach
    </div>
  @else
    <p>No hay imágenes disponibles.</p>
  @endif

@endsection
