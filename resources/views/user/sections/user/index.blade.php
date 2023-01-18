@extends('user.main')

@section('title', 'User')

@section('content')

  <section class="section profile py-3">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ auth()->user()->picture ? asset('storage/' . auth()->user()->picture) : '/img/default.png' }}"
              alt="Profile" class="rounded-circle">
            <h2>{{ auth()->user()->name }}</h2>
            <h3>{{ auth()->user()->is_admin ? 'Admin' : 'User' }}</h3>
          </div>
        </div>

      </div>
      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            {{-- Bordered Tabs --}}
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Akun</button>
              </li>

            </ul>
            {{-- Menu Content --}}
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Tentang Saya</h5>
                <p class="small fst-italic">{{ auth()->user()->bio ?? 'Belum ada bio' }}</p>

                <h5 class="card-title">Profile Pengguna</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama</div>
                  <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                  <div class="col-lg-9 col-md-8">{{ auth()->user()->date_of_birth ?? 'Belum ada' }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                {{-- Profile Edit Form --}}
                <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('put')

                  <input class="d-none" type="checkbox" name="removeImage" id="removeImage">

                  <div class="row mb-3">
                    <label for="picture" class="col-md-4 col-lg-3 col-form-label">Foto Diri</label>
                    <div class="col-md-8 col-lg-9">
                      <img
                        src="{{ auth()->user()->picture ? asset('storage/' . auth()->user()->picture) : '/img/default.png' }}"
                        alt="Profile" id="image">
                      <div class="pt-2">
                        <input class="d-none" type="file" id="picture" name="picture">
                        <button type="button" class="btn btn-primary btn-sm" title="Upload new profile image">
                          <i class="bi bi-upload" id="upload-picture"></i>
                        </button>
                        @if (auth()->user()->picture)
                          <button type="button" class="btn btn-danger btn-sm" title="Remove my profile image">
                            <i class="bi bi-trash" id="remove-picture"></i>
                          </button>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="name"
                        value="{{ auth()->user()->name }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="date_of_birth" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="date_of_birth" type="date" class="form-control" id="date_of_birth"
                        value="{{ auth()->user()->date_of_birth }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="bio" class="col-md-4 col-lg-3 col-form-label">Bio</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="bio" class="form-control" id="bio" style="height: 100px">{{ auth()->user()->bio }}</textarea>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-blue">Simpan Perubahan</button>
                  </div>
                </form>{{-- End Profile Edit Form --}}

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">

                <h5 class="card-title pt-0">Ubah Password</h5>
                {{-- Change Password Form --}}
                <form action="{{ route('password.change') }}" method="POST">
                  @csrf
                  @method('put')

                  <div class="row mb-3">
                    <label for="old_password" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="old_password" type="password" class="form-control" id="old_password" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="password" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="password" required>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password
                      Baru</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password_confirmation" type="password" class="form-control"
                        id="password_confirmation" required>
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-blue">Change Password</button>
                  </div>
                </form>{{-- End Change Password Form --}}

              </div>

            </div>{{-- End Bordered Tabs --}}

          </div>
        </div>

      </div>
    </div>
  </section>

  @push('scripts')
    @if ($errors->any())
      <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="error-toast" class="toast align-items-center text-bg-warning" role="alert" aria-live="assertive"
          aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body">
              <i class="bi bi-check-circle me-2"></i> {{ $errors->first() }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      </div>

      <script>
        const toastEl = document.getElementById('error-toast');
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
      </script>
    @endif

    @if (session()->has('success'))
      <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="success-toast" class="toast align-items-center text-bg-success" role="alert" aria-live="assertive"
          aria-atomic="true">
          <div class="d-flex">
            <div class="toast-body">
              <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
        </div>
      </div>

      <script>
        const toastEl = document.getElementById('success-toast');
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
      </script>
    @endif

    <script>
      const uploadBtn = document.getElementById('upload-picture');
      const removeBtn = document.getElementById('remove-picture');
      const inputPicture = document.getElementById('picture');
      const image = document.getElementById('image');

      uploadBtn.addEventListener('click', () => {
        inputPicture.click();
      })

      inputPicture.addEventListener('change', () => {
        const oFReader = new FileReader();
        oFReader.readAsDataURL(inputPicture.files[0]);

        oFReader.onload = function(oFREvent) {
          image.src = oFREvent.target.result;
        }
      })

      removeBtn.addEventListener('click', () => {
        image.src = '/img/default.png';

        document.getElementById('removeImage').checked = true;
      })
    </script>
  @endpush

@endsection
