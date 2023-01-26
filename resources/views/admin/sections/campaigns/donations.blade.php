@extends('admin.main')

@section('title', 'List Donatur')

@section('content')
  <div class="pagetitle">
    <div class="row justify-content-center">
      <div class="col col-sm-11 col-md-10 col-xl-8">
        <h1>
          <a href="{{ route('campaigns.show', $campaign->slug) }}" class="link-secondary me-1"><i
              class="bi bi-arrow-left"></i></a>
          List Donatur
        </h1>
      </div>
    </div>

  </div>
  {{-- End Page Title --}}

  <section class="section dashboard">
    <div class="row justify-content-center">
      <div class="col col-sm-11 col-md-10 col-xl-8">

        <div class="text-end">
          <button class="btn btn-blue mb-3"><i class="bi bi-download me-2"></i>Download as .xls</button>
        </div>

        <div class="card">
          <div class="card-body">

            @if ($donations->count())
              <ul class="list-group list-group-flush mt-3">
                @foreach ($donations as $donation)
                  <li class="list-group-item">
                    <div class="d-flex">
                      @if ($donation->user_id)
                        <img alt="user comment profile" class="rounded-circle" width="40" height="40"
                          src="{{ $donation->user->picture ? asset('storage/' . $donation->user->picture) : '/img/default.png' }}" />
                      @else
                        <img alt="user comment profile" class="rounded-circle" width="40" height="40"
                          src="/img/default.png" />
                      @endif

                      <div class="ms-3 col">
                        @if ($donation->user_id)
                          <div class="d-flex justify-content-between">
                            <h6 class="m-0">{{ $donation->user->name }}</h6>
                            <small>{{ $donation->created_at->format('j M Y') }}</small>
                          </div>
                          <small>{{ $donation->user->email }}</small>
                        @else
                          <div class="d-flex justify-content-between">
                            <h6 class="m-0">{{ $donation->name }}</h6>
                            <small>{{ $donation->created_at->format('j M Y') }}</small>
                          </div>
                          <small>{{ $donation->email }}</small>
                        @endif
                        <h4 class="fw-semibold mt-2 mb-0">Rp {{ number_format($donation->amount ?? 0, 0, '.', '.') }}
                        </h4>
                      </div>
                    </div>
                  </li>
                @endforeach
              </ul>

              {{ $donations->links() }}
            @else
              <h6 class="text-center pt-3">Belum ada donasi yang masuk</h6>
            @endif

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
