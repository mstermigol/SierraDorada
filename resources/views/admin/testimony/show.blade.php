@extends('layouts.admin')
@section('title', 'Admin->Ver Testimonio')
@section('section-title', 'Testimonios')
@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.testimony.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras"><i
        class="fas fa-arrow-left"></i></a>
  </div>
  <div class="d-flex flex-column mx-auto max-200-ch">
    <p class="bold color-black">Nombre</p>
    <p class="color-black">{{ $viewData['testimony']->getName() }}</p>
    <p class="bold color-black">Testimonio</p>
    <p class="color-black">{{ $viewData['testimony']->getTestimony() }}</p>
    <p class="bold color-black">Imagen</p>
    <img src="{{ asset('storage/testimonies/' . $viewData['testimony']->getImage()) }}"
      alt="{{ $viewData['testimony']->getName() }}">
  </div>
@endsection
