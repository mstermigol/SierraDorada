@extends('layouts.admin')
@section('title', 'Admin->Eventos')
@section('section-title', 'Eventos')
@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.event.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras"><i
        class="fas fa-arrow-left"></i></a>
  </div>

  <form class="d-flex flex-column mx-auto" action="{{ route('admin.event.update', ['id' => $viewData['event']->getId()]) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <input type="hidden" id="deletedImages" name="deletedImages" value="">

    <label for="title">Titulo</label>
    <input class="form-control" type="text" id="title" name="title"
      value="{{ old('title', $viewData['event']->getTitle()) }}" required>

    <label for="descriptionMiniature">Descripción Miniatura</label>
    <input class="form-control" type="text" id="descriptionMiniature" name="descriptionMiniature"
      value="{{ old('descriptionMiniature', $viewData['event']->getDescriptionMiniature()) }}" required>

    <label for="imageMiniature">Imagen Miniatura</label>
    <input class="form-control" type="file" id="imageMiniature" name="imageMiniature">

    <label for="description">Descripción</label>
    <textarea class="form-control" id="description" name="description" rows="5"
      required>{{ old('description', $viewData['event']->getDescription()) }}</textarea>

    <label for="images">Añade imagenes (Max. 20 a la vez) (opcional)</label>
    <input class="form-control" type="file" id="images" name="images[]" multiple>

    <label for="gallery">Imagenes galeria (Puedes eliminar las que quieras)</label>
    <div class="container d-flex flex-column">
      @if (!empty($viewData['event']->getImages()))
        <div id="gallery" class="d-flex flex-wrap"></div>
        <div id="pagination-controls" class="container-fluid d-flex justify-content-center mb-3">
          <button id="prevPage" class="btn btn-primary bg-gold b-gold mx-3"><i class="fas fa-arrow-left"></i>
            Anterior</button>
          <button id="nextPage" class="btn btn-primary bg
            -gold b-gold mx-3">Siguiente <i
              class="fas fa-arrow-right"></i></button>
        </div>
        <p id="noImagesMessage" class="color-black text-center d-none">No hay imágenes disponibles.</p>
        <div id="galleryData" data-images='@json($viewData['event']->getImages())'
          data-folder-path="{{ asset('storage/' . $viewData['images']) }}"></div>
        @else
            <p class="color-black text-center">No hay imágenes disponibles.</p>
        @endif
    </div>

    <div class="container-fluid d-flex justify-content-center">
      <button id="updateButton" class="btn-golden b-radius-10 mt-2 color-white mb-3" type="submit">Actualizar</button>
    </div>

    </form>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
<script src="{{ asset('/js/galleryPaginationEdit.js') }}"></script>
@endsection

