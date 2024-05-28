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

  <!-- Allies section -->
  @include('subviews.landing.allies')

  <!-- Footer section -->
  @include('subviews.footer')

  <!-- Whatsapp button -->
  @guest
    <div class="fab">
      <a href="#" target="_blank">
        <img src="{{ url('images/whatsapp-fixed.png') }}" alt="WhatsApp Logo">
      </a>
    </div>
  @else
    <div class="fab">
      <a href="{{route('admin.user.index')}}">
        <img src="{{ url('images/admin.png') }}" alt="Admin">
      </a>
    </div>

  @endguest


@endsection
