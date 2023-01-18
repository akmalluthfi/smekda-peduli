@extends('user.main')

@section('title', 'Pengaturan')

@section('content')
  <div class="col-sm-10 col-md-8 col-lg-6 py-3">
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">Ubah Password</h5>
        <hr>
        <form>
          <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-3">
            <label for="confirm_password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-blue">Simpan Password</button>
          </div>
        </form>
      </div>
    </div>

  </div>
@endsection
