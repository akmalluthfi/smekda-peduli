@extends('admin.main')

@section('title', 'Dashboard')

@section('content')
  <div class="pagetitle">
    <h1>Dashboard</h1>
  </div>
  {{-- End Page Title --}}

  <section class="section dashboard">
    <div class="row">

      <div class="col-md-6 col-xxl-4">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title"><a href="/admin/campaigns" class="card-title">Jumlah Campaign</a></h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-flag"></i>
              </div>
              <div class="ps-3">
                <h6>{{ $campaigns['total'] }}</h6>
                <div class="hstack">
                  <span class="text-primary small fw-bold">{{ $campaigns['open'] }}</span>
                  <span class="text-muted small ps-1">Open</span>
                  <div class="vr mx-2"></div>
                  <span class="text-success small fw-bold">{{ $campaigns['open'] }}</span>
                  <span class="text-muted small ps-1">Close</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xxl-4">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title"><a href="/admin/payments" class="card-title">Jumlah Donasi</a></h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-heart-fill"></i>
              </div>
              <div class="ps-3">
                <h6>{{ $donation_count['total'] }}</h6>
                <div class="hstack">
                  <span class="text-primary small fw-bold">{{ $donation_count['success'] }}</span>
                  <span class="text-muted small ps-1">Success</span>
                  <div class="vr mx-2"></div>
                  <span class="text-success small fw-bold">{{ $donation_count['other'] }}</span>
                  <span class="text-muted small ps-1">Other</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xxl-4">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title"><a href="/admin/payments" class="card-title">Total Donasi</a></h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-credit-card"></i>
              </div>
              <div class="ps-3">
                <h6>Rp {{ number_format($donation_sum, 2, ',', '.') }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection
