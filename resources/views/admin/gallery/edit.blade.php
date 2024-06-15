@extends('layouts.admin')
@section('title', 'Admin->Galería')
@section('section-title', 'Galería')
@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-primary bg-gold b-gold mb-3"><i
        class="fas fa-arrow-left"></i></a>
  </div>

  <form class="d-flex flex-column mx-auto" action="{{ route('admin.gallery.update', ['id' => $viewData['gallery']->getId()]) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <input type="hidden" id="deletedImages" name="deletedImages" value="">

    <label for="name">Nombre</label>
    <input class="form-control" type="text" id="name" name="name"
      value="{{ old('name', $viewData['gallery']->getName()) }}" required>

    <label for="images">Añade imagenes (Max. 20 a la vez)</label>
    <input class="form-control" type="file" id="images" name="images[]" multiple>



      <div class="container-fluid d-flex justify-content-center">
        <button id="updateButton" class="btn-golden b-radius-10 mt-2 color-white mb-3" type="submit">Actualizar</button>
      </div>
    <label for="gallery">Imagenes galeria (Puedes eliminar las que quieras)</label>

  </form>
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
