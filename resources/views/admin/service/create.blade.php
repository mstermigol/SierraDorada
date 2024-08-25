@extends('layouts.admin')
@section('title', 'Admin->Servicios')
@section('section-title', 'Servicios')
@section('content')
<div class="container-fluid p-0">
    <a href="{{ route('admin.service.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras"><i
        class="fas fa-arrow-left"></i></a>
</div>
<form class="d-flex flex-column mx-auto" action="{{ route('admin.service.save') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <label for="name">Nombre</label>
    <input class="form-control" type="text" id="name" name="name" required>

    <label for="descriptionMiniature">Descripción miniatura</label>
    <textarea class="form-control" id="descriptionMiniature" name="descriptionMiniature" required></textarea>

    <label for="imageMiniature">Imagen miniatura</label>
    <input class="form-control" type="file" id="imageMiniature" name="imageMiniature" required>

    <label for="priceWeekday">Precio mensual en semana (opcional)</label>
    <input class="form-control" type="number" id="priceWeekday" name="priceWeekday" step="1">

    <label for="priceWeekend">Precio mensual en fin de semana (opcional)</label>
    <input class="form-control" type="number" id="priceWeekend" name="priceWeekend" step="1">

    <label for="inLanding">¿Mostrar en landing?</label>
    <select class="form-control" id="inLanding" name="inLanding" required>
        <option value="1">Sí</option>
        <option value="0">No</option>
    </select>

    <label for="description">Descripción</label>
    <textarea class="form-control" id="description" name="description" required></textarea>

    <label for="images">Imágenes (Max. 20 a la vez)</label>
    <input class="form-control" type="file" id="images" name="images[]" multiple>

    <button class="btn-golden b-radius-10 mt-2 color-white mb-3" type="submit">Crear</button>
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
@endsection
