@extends('layouts.admin')
@section('title', 'Admin->Servicios')
@section('section-title', 'Servicios')
@section('content')
<div class="container-fluid p-0">
    <a href="{{ route('admin.service.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras"><i
            class="fas fa-arrow-left"></i></a>
</div>

<form class="d-flex flex-column mx-auto" action="{{ route('admin.service.update', ['id' => $viewData['service']->getId()]) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <input type="hidden" id="deletedImages" name="deletedImages" value="">

    <label for="name">Nombre</label>
    <input class="form-control" type="text" id="name" name="name"
        value="{{ old('name', $viewData['service']->getName()) }}" required>

    <label for="descriptionMiniature">Descripción miniatura</label>
    <textarea class="form-control" id="descriptionMiniature" name="descriptionMiniature"
        required>{{ old('descriptionMiniature', $viewData['service']->getDescriptionMiniature()) }}</textarea>

    <label for="imageMiniature">Imagen miniatura</label>
    <input class="form-control" type="file" id="imageMiniature" name="imageMiniature">

    <label for="priceWeekday">Precio mensual en semana (opcional)</label>
    <input class="form-control" type="number" id="priceWeekday" name="priceWeekday" step="1"
        value="{{ old('priceWeekday', $viewData['service']->getPriceWeekdayInt()) }}">

    <label for="priceWeekend">Precio mensual en fin de semana (opcional)</label>
    <input class="form-control" type="number" id="priceWeekend" name="priceWeekend" step="1"
        value="{{ old('priceWeekend', $viewData['service']->getPriceWeekendInt()) }}">

    <label for="inLanding">¿Mostrar en landing?</label>
    <select class="form-control" id="inLanding" name="inLanding" required>
        <option value="1" @if ($viewData['service']->getInLanding() == 1) selected @endif>Sí</option>
        <option value="0" @if ($viewData['service']->getInLanding() == 0) selected @endif>No</option>
    </select>

    <label for="description">Descripción</label>
    <textarea class="form-control" id="description" name="description"
        required>{{ old('description', $viewData['service']->getDescription()) }}</textarea>

    <label for="images">Imágenes (Max. 20 a la vez)</label>
    <input class="form-control" type="file" id="images" name="images[]" multiple>

    <label for="gallery">Imágenes galería (Puedes eliminar las que quieras) (opcional)</label>
    <div class="container d-flex
        flex-column">
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
