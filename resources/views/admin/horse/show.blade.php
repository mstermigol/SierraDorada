@extends('layouts.admin')
@section('title', 'Admin->Ver Caballo')
@section('section-title', 'Caballos')
@section('content')
  <div class="container-fluid p-0">
    <a href="{{ route('admin.horse.index') }}" class="btn btn-primary bg-gold b-gold mb-3" aria-label="Atras"><i
        class="fas fa-arrow-left"></i></a>
  </div>
  <div class="d-flex flex-column mx-auto max-200-ch">
    <p class="bold color-black">Nombre</p>
    <p class="color-black">{{ $viewData['horse']->getName() }}</p>
    <p class="bold color-black">Descripción</p>
    <p class="color-black">{{ $viewData['horse']->getDescription() }}</p>
    <p class="bold color-black">Imagen</p>
    <img src="{{ asset('storage/horses/' . $viewData['horse']->getImage()) }}" alt="{{ $viewData['horse']->getName() }}">
  </div>
@endsection
