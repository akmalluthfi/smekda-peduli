@extends('user.main')

@section('title', 'Home')

@section('content')

  <section class="campaign pt-3 mb-5">
    @if ($campaigns->count() <= 0)
      <div class="w-100 bg-secondary bg-opacity-25 rounded-3 d-flex align-items-center justify-content-center"
        style="min-height: var(--carousel-min-height);max-height: var(--carousel-max-height);">
        <i class="bi bi-images text-secondary" style="font-size:8rem"></i>
      </div>
    @else
      <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          @foreach ($campaigns->take(3) as $campaign)
            <button class="@if ($loop->first) active @endif" type="button" data-bs-target="#bannerCarousel"
              data-bs-slide-to="{{ $loop->index }}" aria-label="Slide {{ $loop->iteration }}"></button>
          @endforeach
        </div>
        <div class="carousel-inner rounded-3 ratio ratio-21x9">
          @foreach ($campaigns->take(3) as $campaign)
            <div class="carousel-item @if ($loop->first) active @endif">
              <a href="{{ route('user.campaigns.show', $campaign->slug) }}">
                <img src="{{ asset('storage/' . $campaign->image) }}" class="d-block w-100 h-100"
                  alt="{{ $campaign->title }}">
              </a>
            </div>
          @endforeach
        </div>
      </div>
    @endif
  </section>

  <section class="mb-5">
    <h2 class="mb-3">Campaign terbaru</h2>

    @if ($campaigns->count() > 3)
      <div class="row mb-3">
        @foreach ($campaigns->skip(3) as $campaign)
          <x-campaign-card :$campaign />
        @endforeach
      </div>

      <div class="text-center">
        <a href="/campaigns" class="btn btn-blue">Lihat Lainnya <i class="bi bi-arrow-right ms-2"></i></a>
      </div>
    @else
      <h6 class="text-center py-5 text-black-50">Tidak ada campaign yang tersedia. <a class="link-secondary"
          href="/campaigns">cek disini.</a>
      </h6>
    @endif

  </section>

@endsection
