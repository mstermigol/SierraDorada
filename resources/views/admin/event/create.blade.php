@extends('layouts.admin')
@section('title', 'Admin->Eventos')
@section('section-title', 'Eventos')
@section('content')
<div class="container-fluid p-0">
    <a href="{{ route('admin.event.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras"><i
        class="fas fa-arrow-left"></i></a>
</div>
<form class="d-flex flex-column mx-auto" action="{{ route('admin.event.save') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <label for="title">Título</label>
    <input class="form-control" type="text" id="title" name="title" required>

    <label for="descriptionMiniature">Descripción miniatura</label>
    <textarea class="form-control" id="descriptionMiniature" name="descriptionMiniature" required></textarea>

    <label for="imageMiniature">Imagen miniatura</label>
    <input class="form-control" type="file" id="imageMiniature" name="imageMiniature" required>

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


