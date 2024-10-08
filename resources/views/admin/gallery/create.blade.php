@extends('layouts.admin')
@section('title', 'Admin->Galería')
@section('section-title', 'Galería')
@section('content')
<div class="container-fluid p-0">
    <a href="{{ route('admin.gallery.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras"><i
        class="fas fa-arrow-left"></i></a>
</div>
<form class="d-flex flex-column mx-auto" action="{{ route('admin.gallery.save') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <label for="name">Nombre</label>
    <input class="form-control" type="text" id="name" name="name" required>

    <label for="images">Imágenes (Max. 20 a la vez) (opcional)</label>
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
