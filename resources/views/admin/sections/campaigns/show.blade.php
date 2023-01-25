@extends('admin.main')

@section('title', $campaign->title)

@section('content')
  <section class="section dashboard">
    <div class="row justify-content-center">
      <div class="col" style="max-width: 52.5rem">

        <div class="d-flex justify-content-between mb-3">
          <a href="{{ route('admin.campaigns.donations.index', $campaign->slug) }}" class="btn btn-blue">
            <i class="bi bi-heart-fill"></i>
            Donatur
          </a>
          <div>
            <a href="{{ route('campaigns.edit', $campaign->slug) }}" class="btn btn-success">
              <i class="bi bi-pencil-square"></i> Ubah
            </a>
            <button class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
          </div>
        </div>

        <div class="card position-relative">
          <a href="{{ route('campaigns.index') }}"
            class="position-absolute p-1 text-bg-light fw-bold rounded-circle text-center"
            style="top: 10px;left: 10px; width: 32px"><i class="bi bi-arrow-left"></i></a>

          <img src="{{ asset('storage/' . $campaign->image) }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{ $campaign->title }}</h5>
            <h6 class="fw-bold m-0 color-primary">{{ $campaign->donations_amount }}</h6>
            <small>Terkumpul dari <span class="fw-bold">{{ $campaign->formatted_target_amount }}</span></small>

            <div class="progress my-3" style="height: 5px">
              <div class="progress-bar" role="progressbar" aria-label="Example with label"
                style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0"
                aria-valuemax="100">
              </div>
            </div>

            <div class="d-flex justify-content-between">
              <div class="col-auto">{{ $campaign->donations_count }} <small>Donasi</small></div>
              <div class="col-auto">{{ $campaign->duration_in_days }} <small>hari</small></div>
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
    </div>
  </section>
@endsection
