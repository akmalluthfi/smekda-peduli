<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Donasi - Smekda Peduli</title>

  <meta content="Donation App" name="description" />
  <meta content="Donation App" name="keywords" />

  {{-- Favicons --}}
  <link href="/favicon.ico" rel="icon" />
  <link href="/apple-touch-icon.png" rel="apple-touch-icon" />

  {{-- Vendor CSS Files --}}
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/icons/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  {{-- Template Main CSS File --}}
  <link href="/css/main.css" rel="stylesheet">

</head>

<body>

  <header class="bg-white py-3 shadow-sm fixed-top">
    <div class="container-fluid d-flex align-items-center" style="max-width: 36rem">
      <h3 class="m-0 me-3">
        <a class="link-dark" href="{{ route('user.campaigns.show', $campaign->slug) }}">
          <i class="bi bi-arrow-left"></i></a>
      </h3>
      <h5 class="m-0 fw-bold text-overflow-ellipsis">{{ $campaign->title }}</h5>
    </div>
  </header>

  <main class="container-fluid" style="margin-top: 4rem">
    <div class="pt-3 m-auto" style="max-width: 36rem">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Nominal Donasi</h5>

          <form action="{{ route('campaigns.donations.store', $campaign->slug) }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="amount" class="form-label">Isi nominal donasi</label>
              <div class="input-group">
                <span class="input-group-text" id="money">Rp </span>
                <input type="number" min="1000" class="form-control @error('amount') is-invalid @enderror"
                  id="amount" aria-describedby="money" name="amount" value="{{ old('amount') }}" required>
                @error('amount')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-text">Donasi minimal Rp 1.000</div>
            </div>

            @guest
              <p class="text-center"> <a href="/login">Masuk</a> atau lengkapi data di bawah ini</p>

              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                  name="name" placeholder="Nama Lengkap" value="{{ old('name') }}">
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                  name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            @endguest

            <div class="form-check mb-3">
              <input class="form-check-input @error('as_anonymous') is-invalid @enderror" type="checkbox"
                id="as_anonymous" name="as_anonymous" @checked(old('as_anonymous'))>

              @error('as_anonymous')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <label class="form-check-label" for="as_anonymous">
                Donasi sebagai anonymous
              </label>
            </div>

            <div class="mb-3">
              <label for="comment" class="form-label">Dukungan untuk campaign</label>
              <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3"
                placeholder="Tulis dukungan atau doa untuk pasien">{{ old('comment') }}</textarea>
              @error('comment')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <button type="submit" class="btn btn-blue w-100">Lanjut Pembayaran</button>

          </form>

        </div>
      </div>
    </div>
  </main>

  {{-- Template Main JS File --}}
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>
