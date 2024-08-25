@extends('layouts.admin')
@section('title', 'Admin->Editar Caballo')
@section('section-title', 'Caballos')
@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.horse.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras"><i
        class="fas fa-arrow-left"></i></a>
  </div>
  <form class="d-flex flex-column mx-auto" action="{{ route('admin.horse.update', ['id' => $viewData['horse']->getId()]) }}"
    method="POST" enctype="multipart/form-data">

    @csrf
    @method('PATCH')

    <label for="name">Nombre</label>
    <input class="form-control" type="text" id="name" name="name"
      value="{{ old('name', $viewData['horse']->getName()) }}" required>

    <label for="description">Descripción</label>
    <textarea class="form-control" id="description" name="description" required>{{ old('description', $viewData['horse']->getDescription()) }}</textarea>

    <label for="image">Imagen</label>
    <input class="form-control" type="file" id="image" name="image">

    <button class="btn-golden b-radius-10 mt-2 color-white mb-3" type="submit">Actualizar</button>

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
