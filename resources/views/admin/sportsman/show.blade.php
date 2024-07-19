@extends('layouts.admin')
@section('title', 'Admin->Ver Deportista')
@section('section-title', 'Deportista')
@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.sportsman.index') }}" class="btn btn-primary bg-gold b-gold mb-3"><i
        class="fas fa-arrow-left"></i></a>
  </div>
  <div class="d-flex flex-column mx-auto max-200-ch">
    <p class="bold color-black">Nombre</p>
    <p class="color-black">{{ $viewData['sportsman']->getName() }}</p>
    <p class="bold color-black">Imagen</p>
    <img src="{{ asset('storage/sportsman/' . $viewData['sportsman']->getImage()) }}"
      alt="{{ $viewData['sportsman']->getName() }}">
    </div>
@endsection
