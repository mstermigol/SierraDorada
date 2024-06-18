@extends('layouts.admin')
@section('title', 'Admin->Crear Usuario')
@section('section-title', 'Usuarios')
@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.user.index') }}" class="btn btn-primary bg-gold b-gold mb-3"><i class="fas fa-arrow-left"></i></a>
  </div>
  <form class="d-flex flex-column mx-auto" action="{{ route('admin.user.save') }}" method="POST">
    @csrf
    <label for="email">Correo</label>
    <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required>

    <label for="password">Contraseña</label>
    <input class="form-control" type="password" id="password" name="password" required>

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
