@extends('admin.main')

@section('title', 'Dashboard')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <div class="col-xxl-4 col-sm-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/admin/campaigns" class="card-title">Campaign</a></h5>
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
                                    <span class="text-success small fw-bold">{{ $campaigns['completed'] }}</span>
                                    <span class="text-muted small ps-1">Completed</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-sm-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/admin/payments" class="card-title">Metode Pembayaran</a></h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-credit-card"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $payments_count }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-5 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0">Top Payments</h5>
                            <a href="/admin/payments" class="btn btn-outline-info btn-sm h-100">View all</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Metode</th>
                                    <th scope="col" class="text-nowrap">Jumlah Donasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($top_payments) > 0)
                                    @foreach ($top_payments as $payment)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $payment->method }}</td>
                                            <td>{{ $payment->donations_count }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada metode pembayaran</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
