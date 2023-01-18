@extends('auth.layout')

@section('title', 'Masuk')

@section('content')
  <div class="card mb-3">
    <div class="card-body">
      <div class="pt-4 pb-2">
        <h5 class="card-title text-center fs-4">
          Masuk
        </h5>

        @error('login-error')
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @enderror
      </div>

      <form class="row g-3" method="POST" action="/login">
        @csrf

        <div class="col-12">
          <label for="email" class="form-label">Email</label>
          <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
            required placeholder="Email" value="{{ old('email') }}" />
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-12">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
            id="password" required placeholder="Password" />
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe" />
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-blue w-100" type="submit">
            Masuk
          </button>
        </div>
        <div class="col-12">
          <p class="small my-2 text-center">
            Belum punya akun? Ayo
            <a href="/registration" class="fw-bold">daftar</a>
          </p>
        </div>
      </form>
    </div>
  </div>
@endsection
