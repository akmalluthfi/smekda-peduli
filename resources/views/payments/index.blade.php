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
        <a class="link-dark" href="/">
          <i class="bi bi-arrow-left"></i></a>
      </h3>
      <h5 class="m-0 fw-bold text-overflow-ellipsis" id="title">Judul</h5>
    </div>
  </header>

  <main class="container-fluid" style="margin-top: 4rem">
    <div class="pt-3 m-auto" style="max-width: 36rem">

      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endforeach
      @endif

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Detail Transaksi</h5>

          <ul class="list-group list-group-flush mb-3">
            <li class="list-group-item">
              <h6>Detail Donasi</h6>
              <div class="d-flex justify-content-between">
                <div class="text">Tanggal</div>
                <span>29 Desember 2022</span>
              </div>
              <div class="d-flex justify-content-between">
                <div class="text">ID Donasi</div>
                <span>343535345</span>
              </div>
              <div class="d-flex justify-content-between">
                <div class="text">Status</div>
                <span class="badge text-bg-danger">Expire</span>
              </div>
            </li>
            <li class="list-group-item">
              <h6>Tujuan donasi</h6>
              <div class="d-flex justify-content-between">
                <div class="text">Donasi untuk</div>
                <span>Something to gain after the pain</span>
              </div>
            </li>
            <li class="list-group-item">
              <h6>Donasi oleh</h6>
              <span class="d-block">alfi</span>
              <span>alfi@gmail.com</span>
            </li>
            <li class="list-group-item">
              <h6>Jumlah donasi</h6>
              <div class="d-flex justify-content-between">
                <div class="text">Donasi utama</div>
                <span>Rp 12.000</span>
              </div>
              <div class="d-flex justify-content-between">
                <div class="text">Total</div>
                <span>Rp 12.000</span>
              </div>
            </li>
          </ul>

          <button class="btn btn-blue w-100">Bayar</button>

        </div>
      </div>
    </div>
  </main>

  @stack('scripts')

  {{-- Template Main JS File --}}
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>
