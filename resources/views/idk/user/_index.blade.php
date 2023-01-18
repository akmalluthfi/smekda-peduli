@extends('user.main')

@section('title', 'User')

@section('content')

  <div class="col-md-8 py-3">
    <div class="card mb-3">
      <div class="card-body">
        <h5 class="card-title">Profil Saya</h5>
        <hr>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label d-block">Foto Diri</label>
            <div class="d-flex mb-3 gap-3">
              <img src="/img/default.png" alt="profile" class="rounded rounded-sm" style="height: 100px;">
              <div class="mt-auto">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="mb-3">
            <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="date_of_birth">
          </div>
          <div class="mb-3">
            <label for="bio" class="form-label">Tentang Saya</label>
            <textarea class="form-control" id="bio" rows="3"></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-blue">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
