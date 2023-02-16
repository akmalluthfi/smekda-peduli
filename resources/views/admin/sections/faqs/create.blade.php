@extends('admin.main')

@section('title', 'Create FAQs')

@section('content')
  <div class="pagetitle">
    <h1>Buat FAQs</h1>
  </div>
  {{-- End Page Title --}}

  <section class="section dashboard">
    <div class="row">
      <div class="col">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              <a href="{{ route('faqs.index') }}" class="link-secondary me-1"><i class="bi bi-arrow-left"></i></a>
              Buat Pertanyaan Baru
            </h5>

            <form class="row g-3" method="POST" action="{{ route('faqs.store') }}">
              @csrf
              <div class="col-12">
                <label for="question" class="form-label">Pertanyaan</label>
                <input type="text" class="form-control @error('question') is-invalid @enderror" id="question"
                  name="question" value="{{ old('question') }}" placeholder="Masukkan pertanyaan" required>
                @error('question')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-12">
                <label for="answer" class="form-label">Jawaban</label>
                <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" rows="3" name="answer"
                  placeholder="Berikan jawaban atas pertanyaan sebelumnya" required>{{ old('answer') }}</textarea>
                @error('answer')
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
