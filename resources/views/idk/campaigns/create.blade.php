@extends('admin.main')

@section('title', 'Create Campaign')

@section('content')
    <div class="pagetitle">
        <h1>Create Campaign</h1>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col col-sm-10 col-md-8 col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('campaigns.index') }}" class="link-secondary me-1"><i
                                    class="bi bi-arrow-left"></i></a>
                            Buat Campaign Baru
                        </h5>

                        <form class="row g-3" method="POST" action="{{ route('campaigns.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title') }}"
                                    placeholder="Masukkan judul campaign" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" required>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="target_amount" class="form-label">Jumlah target donasi</label>
                                <input type="number" class="form-control @error('target_amount') is-invalid @enderror"
                                    id="target_amount" name="target_amount" value="{{ old('target_amount') }}"
                                    placeholder="Masukkan jumlah target donasi" required>
                                @error('target_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="duration" class="form-label">Durasi</label>
                                <input type="date" class="form-control @error('duration') is-invalid @enderror"
                                    id="duration" name="duration" value="{{ old('duration') }}" required>
                                @error('duration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                                    name="description" placeholder="Masukkan deskripsi yang bisa menjelaskan keadaan secara jelas" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
