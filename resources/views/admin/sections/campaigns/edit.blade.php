@extends('admin.main')

@section('title', 'Edit Campaign')

@section('content')
  <div class="pagetitle">
    <h1>Detail Campaign</h1>
  </div>
  {{-- End Page Title --}}

  <section class="section dashboard">
    <div class="row">
      <div class="col" style="max-width: 52.5rem">

        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-center">
              <a href="{{ route('campaigns.index') }}" class="link-secondary me-3"><i class="bi bi-arrow-left"></i></a>
              <h5 class="m-0">Ubah Campaign</h5>

              @if ($campaign->status === 'open')
                <span class="badge bg-primary ms-auto text-white">Open</span>
              @else
                <span class="badge bg-warning ms-auto text-black">Closed</span>
              @endif
            </div>

            <form class="row g-3" method="POST" action="{{ route('campaigns.update', $campaign->slug) }}"
              enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="col-12">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                  name="title" value="{{ old('title', $campaign->title) }}" placeholder="Masukkan judul campaign"
                  required>
                @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12">
                <img src="{{ asset('storage/' . $campaign->image) }}" alt="Profile"
                  class="w-100 rounded-3 mb-0 d-block mb-3" style="max-width: 200px" id="preview-image">

                <label for="image" class="form-label">Gambar</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                  name="image" onchange="previewImage()">
                @error('image')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12">
                <label for="target_amount" class="form-label">Jumlah target donasi</label>
                <input type="number" class="form-control @error('target_amount') is-invalid @enderror" id="target_amount"
                  name="target_amount" value="{{ old('target_amount', $campaign->target_amount) }}"
                  placeholder="Masukkan jumlah target donasi" required>
                @error('target_amount')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12">
                <label for="duration" class="form-label">Durasi</label>
                <input type="date" class="form-control @error('duration') is-invalid @enderror" id="duration"
                  name="duration" value="{{ old('duration', $campaign->duration) }}" required>
                @error('duration')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="5"
                  name="description" placeholder="Masukkan deskripsi yang bisa menjelaskan keadaan secara jelas" required>{{ old('description', $campaign->description) }}</textarea>
                @error('description')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-blue">Simpan Perubahan</button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection

@push('scripts')
  <script>
    function previewImage() {
      const image = document.getElementById('preview-image');
      const inputPicture = document.getElementById('image');

      const oFReader = new FileReader();
      oFReader.readAsDataURL(inputPicture.files[0]);

      oFReader.onload = function(oFREvent) {
        image.src = oFREvent.target.result;
      }
    }
  </script>
@endpush
