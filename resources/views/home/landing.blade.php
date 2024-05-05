
@extends('layouts.app')
@section('title', 'Club Sierra Dorada | Equitación | Chalaneria | Equinoterapia | Eventos')
@section('content')


<!-- Hero section -->

@include('subviews.landing.hero')

<!-- Services section -->

@include('subviews.landing.services')

<!-- Teachers section -->

@include('subviews.landing.teachers')

<!-- Testimonies section -->
@include('subviews.landing.testimonies')

@endsection