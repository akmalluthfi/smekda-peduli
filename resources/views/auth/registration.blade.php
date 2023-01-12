@extends('auth.layout')

@section('title', 'Daftar akun')

@section('content')
  <div class="card mb-3">
    <div class="card-body">
      <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">
          Daftar akun
        </h5>
      </div>

      <form class="row g-3" method="POST">
        @csrf
        <div class="col-12">
          <label for="name" class="form-label">Nama Lengkap</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
            required placeholder="Nama Lengkap" value="{{ old('name') }}" />
          <div id="nameHelp" class="form-text">Masukkan nama asli Anda.</div>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-12">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
            required placeholder="Alamat Email" value="{{ old('email') }}" />
          <div id="emailHelp" class="form-text">Gunakan alamat email aktif Anda.</div>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-12">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
            id="password" required placeholder="Masukkan password baru" />
          <div id="passwordHelp" class="form-text">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka.</div>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-12">
          <button class="btn btn-blue w-100" type="submit">
            Daftar
          </button>
        </div>
        <div class="col-12">
          <p class="small my-2 text-center">
            Sudah punya akun?
            <a href="/registration" class="fw-bold">Masuk sekarang</a>
          </p>
        </div>
      </form>
    </div>
  </div>
@endsection
