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
              <a href="{{ route('campaigns.show', $campaign->slug) }}">
                <img src="{{ $campaign->image ? asset('storage/' . $campaign->image) : '/assets/img/card.jpg' }}"
                  class="d-block w-100 h-100" alt="random">
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
          @php
            $progress = ($campaign->donations_sum_amount / $campaign->target_amount) * 100;
          @endphp
          <div class="col-12">
            <div class="card mb-3 shadow-sm border-0">
              <div class="row g-0">
                <div class="col-4 col-sm-3 col-lg-2">
                  <img class="img-fluid rounded-start img-responsive"
                    src="{{ $campaign->image ? asset('storage/' . $campaign->image) : '/assets/img/card.jpg' }}"
                    alt="{{ $campaign->title }}">
                </div>
                <div class="col-8 col-sm-9 col-lg-10">
                  <div class="card-body p-2 h-100 d-flex flex-column justify-content-between">
                    <div class="top">
                      <div class="d-flex justify-content-between mb-3">
                        <a href="{{ route('campaigns.show', $campaign->slug) }}"
                          class="card-title p-0 m-0 link-campaign">{{ $campaign->title }}</a>
                      </div>
                      <div class="progress" style="height: 5px">
                        <div class="progress-bar bg-dark-blue" role="progressbar" aria-label="Example with label"
                          style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0"
                          aria-valuemax="100">
                        </div>
                      </div>
                    </div>
                    <div class="bottom">
                      <div class="d-flex justify-content-between mt-auto">
                        <div>
                          <div class="text-muted small">Dana terkumpul</div>
                          <div>{{ $campaign->donations_amount }}</div>
                        </div>
                        <div>
                          <div class="text-muted small">Sisa hari</div>
                          <div class="text-end">{{ $campaign->duration }}</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
