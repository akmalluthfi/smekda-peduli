@extends('user.main')

@section('title', 'Donasi Saya')

@section('content')
  <div class="pt-3 m-auto" style="max-width: 36rem">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold">Riwayat Donasi</h5>

        @if ($donations->count())
          <ul class="list-group list-group-flush">
            @foreach ($donations as $donation)
              <li class="list-group-item">
                <div class="row my-2">
                  <img class="col-4 p-0 rounded" alt="user comment profile"
                    src="{{ asset('storage/' . $donation->campaign->image) }}" alt="{{ $donation->campaign->title }}" />
                  <div class="col">
                    <div class="row h-100">
                      <h6 class="m-0 fw-semibold">
                        <a class="nav-link" href="{{ route('payment', $donation->id) }}">
                          {{ $donation->campaign->title }}
                        </a>
                      </h6>
                      <div class="mt-auto">
                        <small class="text-secondary">{{ $donation->created_at->format('d M Y') }} &bull;</small>
                        <small>Rp {{ number_format($donation->amount ?? 0, 0, '.', '.') }}</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto p-0">
                    @if ($donation->status == 'pending')
                      <span class="badge text-bg-warning">{{ $donation->status }}</span>
                    @elseif($donation->status == 'success')
                      <span class="badge text-bg-success">{{ $donation->status }}</span>
                    @elseif($donation->status == 'created')
                      <span class="badge text-bg-warning">Belum Bayar</span>
                    @else
                      <span class="badge text-bg-secondary">{{ $donation->status }}</span>
                    @endif
                  </div>
                </div>
              </li>
            @endforeach
          </ul>
          {{ $donations->links() }}
        @else
          <div class="text-center">
            <h6 class="text-muted mb-3">Kamu belum pernah melakukan donasi sebelumnya, Yuk donasi sekarang</h6>
            <a class="btn btn-outline-blue" href="/campaigns">Donasi Sekarang</a>
          </div>
        @endif



      </div>
    </div>
  </div>
@endsection
