@extends('layouts.app')
@section('title', 'Club Sierra Dorada Servicios')
@section('content')
<div>
    <!-- Navbar -->
    <div class="my-vh-100">
    @include('subviews.navbarOther')

    <div class="px-3 pt-4 pb-4 flex-grow-1">
        <!-- Services title -->
        <div class="container-fluid p-0 mb-3 sections-arrow-title">
        <a href="{{ route('home.landing') }}" class="btn btn-primary bg-gold b-gold mb-3">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h2 class="my-title-letter my-section-title text-center container-fluid">SERVICIOS</h2>
        </div>

        <!-- Services index -->
        <div class="row g-4 mb-4">
        @if (count($viewData['services']) > 0)
            @foreach ($viewData['services'] as $service)
            <div class="col-md-6 col-lg-4">
                <a href="{{ route('home.service.show', ['slug' => $service->getSlug()]) }}" class="card text-decoration-none h-100 my-service-card mx-auto">
                <img
                    src="{{ asset('storage/' . 'services/' . $service->getName() . '/' . $service->getImageMiniature()) }}"
                    class="card-img-top my-service-image" alt="Card Image">
                <div class="card-body my-service-card-body">
                    <h4 class="card-title my-subtitle-letter bold color-white text-center">{{ $service->getName() }}</h4>
                    <p class="card-text px-3 text-center">{{ $service->getDescriptionMiniature() }}</p>
                </div>
                </a>
            </div>
            @endforeach
        @else
            <div class="empty-message">
            <p class="text-center color-black">No hay servicios disponibles por el momento. Revisa de nuevo más tarde.</p>
            </div>
        @endif
        </div>
    </div>

    </div>
    @include('subviews.footer')
</div>

@endsection
