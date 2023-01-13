@extends('user.main')

@section('title', $campaign->title)

@section('content')
  <section class="section dashboard py-4">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6">

        <div class="card position-relative">
          <a href="{{ route('campaigns.index') }}"
            class="position-absolute p-1 text-bg-light fw-bold rounded-circle text-center shadow-sm"
            style="top: 15px;left: 15px; width: 32px"><i class="bi bi-arrow-left"></i></a>

          <img src="/assets/img/card.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{ $campaign->title }}</h5>
            <h6 class="fw-bold m-0 color-primary">{{ $campaign->donations_amount }}</h6>
            <small>Terkumpul dari <span class="fw-bold">{{ $campaign->formatted_target_amount }}</span></small>

            <div class="progress my-3" style="height: 5px">
              <div class="progress-bar bg-blue" role="progressbar" aria-label="Example with label"
                style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0"
                aria-valuemax="100">
              </div>
            </div>

            <div class="d-flex justify-content-between mb-4">
              <div class="col-auto">{{ $campaign->donations_count }} <small>Donasi</small></div>
              <div class="col-auto">{{ $campaign->duration }} <small>hari</small></div>
            </div>

            <div class="d-flex">
              <button class="btn btn-outline-primary me-3" id="btn-share"><i class="bi bi-link-45deg"></i></button>
              <a href="{{ route('campaigns.donations.index', $campaign->slug) }}" class="btn btn-blue w-100">Donasi
                Sekarang</a>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title">Deskripsi</h5>
              <h6 class="m-0 text-muted">{{ $campaign->created_at->format('j M Y') }}</h6>
            </div>
            <p>{{ $campaign->description }}</p>
          </div>
        </div>

      </div>

      <div class="col-12 col-sm-10 col-md-8 col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Komentar</h5>

            @if ($comments->count())
              <ul class="list-group list-group-flush">
                @foreach ($comments as $comment)
                  <li class="list-group-item">
                    <div class="d-flex mb-3">
                      @if ($comment->user)
                        <img alt="user comment profile" class="rounded-circle" width="40" height="40"
                          src="{{ $comment->user->picture ? asset('storage/' . $comment->user->picture) : '/assets/img/card.jpg' }}" />
                      @else
                        <img alt="user comment profile" class="rounded-circle" width="40" height="40"
                          src="/assets/img/card.jpg" />
                      @endif
                      <div class="ms-3">
                        <h6 class="m-0">{{ $comment->user ? $comment->user->name : 'Anonymous' }}</h6>
                        <small>{{ $comment->created_at->diffforHumans() }}</small>
                      </div>
                    </div>
                    <p>{{ $comment->body }}</p>
                  </li>
                @endforeach
              </ul>

              {{ $comments->links() }}
            @else
              <h6 class="text-center">Belum ada komentar</h6>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@push('scripts')
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="copy-toast" class="toast align-items-center bg-opacity-50 text-bg-info" role="alert" aria-live="assertive"
      aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          <i class="bi bi-check-circle me-2"></i>Tautan berhasil disalin
        </div>
        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('btn-share').addEventListener('click', () => {
      const url = window.location.href;
      navigator.clipboard.writeText(url);

      const toastEl = document.getElementById('copy-toast')
      const toast = new bootstrap.Toast(toastEl)
      toast.show()
    })
  </script>
@endpush
