@extends('layouts.admin')
@section('title', 'Admin->Ver Profesor')
@section('section-title', 'Profesores')
@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.teacher.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras"><i
        class="fas fa-arrow-left"></i></a>
  </div>
  <div class="d-flex flex-column mx-auto max-200-ch">
    <p class="bold color-black">Nombre</p>
    <p class="color-black">{{ $viewData['teacher']->getName() }}</p>
    <p class="bold color-black">Imagen</p>
    <img src="{{ asset('storage/teachers/' . $viewData['teacher']->getImage()) }}"
      alt="{{ $viewData['teacher']->getName() }}">
  </div>
@endsection
