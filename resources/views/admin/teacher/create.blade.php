@extends('layouts.admin')
@section('title', 'Admin->Crear Profesor')
@section('section-title', 'Profesores')
@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.teacher.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras"><i
        class="fas fa-arrow-left"></i></a>
  </div>
  <form class="d-flex flex-column mx-auto" action="{{ route('admin.teacher.save') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <label for="name">Nombre</label>
    <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" required>

    <label for="image">Imagen</label>
    <input class="form-control" type="file" id="image" name="image" required>

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

