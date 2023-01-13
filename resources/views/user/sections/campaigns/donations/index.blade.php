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
    <div class="container-fluid d-flex align-items-center">
      <h3 class="m-0 me-3">
        <a class="link-dark" href="{{ route('user.campaigns.show', $campaign->slug) }}">
          <i class="bi bi-arrow-left"></i></a>
      </h3>
      <h5 class="m-0 fw-bold text-overflow-ellipsis">{{ $campaign->title }}</h5>
    </div>
  </header>

  <main class="container-fluid" style="margin-top: 4rem">
    <div class="py-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Nominal Donasi</h5>

          <form action="{{ route('campaigns.donations.store', $campaign->slug) }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="basic-url" class="form-label">Isi nominal donasi</label>
              <div class="input-group">
                <span class="input-group-text" id="money">Rp </span>
                <input type="number" min="1000" class="form-control" id="basic-url" aria-describedby="money">
              </div>
              <div class="form-text">Donasi minimal Rp 1.000</div>
            </div>

            @guest
              <p class="text-center"> <a href="/login">Masuk</a> atau lengkapi data di bawah ini</p>

              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email">
              </div>
            @endguest

            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="is_anonymous">
              <label class="form-check-label" for="is_anonymous">
                Donasi sebagai anonymous
              </label>
            </div>

            <div class="mb-3">
              <label for="comment" class="form-label">Dukungan untuk campaign</label>
              <textarea class="form-control" id="comment" rows="3" placeholder="Tulis dukungan atau doa untuk pasien"></textarea>
            </div>

            <button class="btn btn-blue w-100">Lanjut Pembayaran</button>

          </form>

        </div>
      </div>
    </div>
  </main>

  @stack('scripts')
  {{-- Template Main JS File --}}
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>
