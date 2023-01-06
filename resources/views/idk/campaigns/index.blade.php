@extends('admin.main')

@section('title', 'List Campaign')

@section('content')
    <div class="pagetitle">
        <h1>List Campaign</h1>
    </div>
    <!-- End Page Title -->

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ route('campaigns.create') }}" class="btn btn-outline-success mb-3">
        <i class="bi bi-plus-square-dotted me-2" style=""></i>Buat Campaign
    </a>

    <section class="section">
        <div class="row">
            <!-- Campaign Card -->
            @foreach ($campaigns as $campaign)
                @php
                    $progress = ($campaign->donations_sum_amount / $campaign->target_amount) * 100;
                @endphp
                <div class="col-12">
                    <div class="card mb-3">
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
                                                class="card-title p-0 m-0">{{ $campaign->title }}</a>
                                            <div class="filter ms-2">
                                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                        class="bi bi-three-dots"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                    <li>
                                                        <a class="dropdown-item text-warning d-flex align-items-center"
                                                            href="{{ route('campaigns.edit', $campaign->slug) }}">
                                                            <i class="bi bi-pencil-square"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('campaigns.destroy', $campaign->slug) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit"
                                                                class="dropdown-item text-danger d-flex align-items-center">
                                                                <i class="bi bi-trash-fill"></i><span>Delete</span>
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="progress" style="height: 5px">
                                            <div class="progress-bar" role="progressbar" aria-label="Example with label"
                                                style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}"
                                                aria-valuemin="0" aria-valuemax="100">
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

        {{-- Paginate --}}
        {{ $campaigns->links() }}

    </section>
@endsection
