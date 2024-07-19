@extends('layouts.admin')
@section('title', 'Admin->Editar Deportista')
@section('section-title', 'Deportista')
@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.sportsman.index') }}" class="btn btn-primary bg-gold b-gold mb-3"><i
        class="fas fa-arrow-left"></i></a>
  </div>
  <form class="d-flex flex-column mx-auto" action="{{ route('admin.sportsman.update', ['id' => $viewData['sportsman']->getId()]) }}"
    method="POST" enctype="multipart/form-data">

    @csrf
    @method('PATCH')

    <label for="name">Nombre</label>
    <input class="form-control" type="text" id="name" name="name"
      value="{{ old('name', $viewData['sportsman']->getName()) }}" required>

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
