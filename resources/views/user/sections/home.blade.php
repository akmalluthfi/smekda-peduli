@extends('user.main')

@section('title', 'Home')

@section('content')

  <div id="bannerCarousel" class="carousel slide py-3" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @for ($i = 0; $i < 3; $i++)
        <button class="@if ($i == 0) active @endif" type="button" data-bs-target="#bannerCarousel"
          data-bs-slide-to="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
      @endfor
    </div>
    <div class="carousel-inner rounded-3 ratio ratio-21x9">
      @for ($i = 0; $i < 3; $i++)
        <div class="carousel-item @if ($i == 0) active @endif">
          <img src="https://source.unsplash.com/random" class="d-block w-100 h-100" alt="random">
        </div>
      @endfor
    </div>
  </div>

  <h2 class="text-center mb-3">Campaign</h2>

@endsection
