@extends('layouts.admin')
@section('title', 'Admin->Editar Testimonio')
@section('section-title', 'Testimonios')
@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.testimony.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras"><i
        class="fas fa-arrow-left"></i></a>
  </div>
  <form class="d-flex flex-column mx-auto" action="{{ route('admin.testimony.update', ['id' => $viewData['testimony']->getId()]) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <label for="name">Nombre</label>
    <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $viewData['testimony']->getName()) }}" required>

    <label for="testimony">Testimonio</label>
    <textarea class="form-control" id="testimony" name="testimony" required>{{ old('testimony', $viewData['testimony']->getTestimony()) }}</textarea>

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
