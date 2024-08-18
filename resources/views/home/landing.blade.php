@extends('layouts.app')
@section('title', 'Club de Chalanería Sierra Dorada - Equitación, Competición y Equinoterapia')
@section('content')


  <!-- Hero section -->
  @include('subviews.landing.hero')

  <!-- Services section -->
  @include('subviews.landing.services')

  <!-- Teachers section -->
  @include('subviews.landing.teachers')

  <!-- Testimonies section -->
  @include('subviews.landing.testimonies')

  <!-- Sportsman section -->
  @include('subviews.landing.sportsman')

  <!-- Allies section -->
  @include('subviews.landing.allies')

  <!-- Footer section -->
  @include('subviews.footer')



@endsection
