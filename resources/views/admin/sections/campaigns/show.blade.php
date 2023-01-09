@extends('admin.main')

@section('title', $campaign->title)

@section('content')
  <section class="section dashboard">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6">

        <div class="card position-relative">
          <a href="{{ route('campaigns.index') }}"
            class="position-absolute p-1 text-bg-light fw-bold rounded-circle text-center"
            style="top: 10px;left: 10px; width: 32px"><i class="bi bi-arrow-left"></i></a>

          <img src="/assets/img/card.jpg" class="card-img-top" alt="...">
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
              <div class="col-auto">{{ $campaign->duration }} <small>hari</small></div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-12 col-sm-10 col-md-8 col-lg-6">
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
      <div class="col-12 col-sm-10 col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title" id="donation">Daftar Donatur</h5>
            {{-- Table with hoverable rows --}}
            <div class="table-responsive-md">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col" class="text-nowrap">Metode Pembayaran</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($donations as $donation)
                    <tr>
                      <th scope="row">{{ $loop->index + $donations->firstItem() }}</th>
                      <td class="text-nowrap">
                        {{ $donation->user->name }}
                      </td>
                      <td>{{ $donation->payment->method }}</td>
                      <td>{{ $donation->amount }}</td>
                      <td>
                        <div class="d-flex flex-nowrap">
                          <a href="" class="btn badge text-primary p-1 border-0 me-2">
                            <i class="bi bi-eye align-text-bottom" style="font-size: 16px"></i>
                          </a>
                          <a href="" class="btn badge text-warning p-1 border-0 me-2">
                            <i class="bi bi-pencil-square align-text-bottom" style="font-size: 16px"></i>
                          </a>
                          <a class="btn badge text-danger p-1 border-0 me-2">
                            <i class="bi bi-trash align-text-bottom" style="font-size: 16px"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{-- End Table with hoverable rows --}}

            {{ $donations->links() }}

          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
