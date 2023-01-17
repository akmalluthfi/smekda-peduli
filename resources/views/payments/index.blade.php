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
      <h5 class="m-0 fw-bold text-overflow-ellipsis" id="title">{{ $donation->campaign->title }}</h5>
    </div>
  </header>

  <main class="container-fluid" style="margin-top: 4rem">
    <div class="pt-3 m-auto" style="max-width: 36rem">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Detail Transaksi</h5>

          <ul class="list-group list-group-flush mb-3">
            <li class="list-group-item">
              <h6>Detail Donasi</h6>
              <div class="d-flex justify-content-between">
                <div class="text">Tanggal</div>
                <span>{{ $donation->created_at->format('d F Y') }}</span>
              </div>
              <div class="d-flex justify-content-between">
                <div class="text-nowrap me-2">ID Donasi</div>
                <span class="text-overflow-ellipsis">{{ $donation->id }}</span>
              </div>
              <div class="d-flex justify-content-between">
                <div class="text">Status</div>
                @if ($donation->status == 'pending')
                  <span class="badge text-bg-warning">{{ $donation->status }}</span>
                @elseif($donation->status == 'success')
                  <span class="badge text-bg-success">{{ $donation->status }}</span>
                @else
                  <span class="badge text-bg-danger">{{ $donation->status }}</span>
                @endif
              </div>
            </li>
            <li class="list-group-item">
              <h6>Tujuan donasi</h6>
              <div class="d-flex justify-content-between">
                <div class="text-nowrap me-2">Donasi untuk</div>
                <a class="text-overflow-ellipsis" href="{{ route('user.campaigns.show', $donation->campaign->slug) }}">
                  {{ $donation->campaign->title }}</a>
              </div>
            </li>
            <li class="list-group-item">
              <h6>Donasi oleh</h6>
              <span class="d-block">{{ $donation->name ?? $donation->user()->name }}</span>
              <span>{{ $donation->email ?? $donation->user()->email }}</span>
            </li>
            <li class="list-group-item">
              <h6>Jumlah donasi</h6>
              <div class="d-flex justify-content-between">
                <div class="text">Donasi utama</div>
                <span>Rp {{ number_format($donation->amount ?? 0, 0, '.', '.') }}</span>
              </div>
              <div class="d-flex justify-content-between">
                <div class="text">Total</div>
                <span>Rp {{ number_format($donation->amount ?? 0, 0, '.', '.') }}</span>
              </div>
            </li>
          </ul>

          <button id="pay-button" class="btn btn-blue w-100">Bayar</button>

        </div>
      </div>
    </div>
  </main>

  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
  <script>
    // For example trigger on button clicked, or any time you need
    const payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $donation->snap_token }}', {
        onSuccess: function(result) {
          /* You may add your own implementation here */
          location.reload();
        },
        onPending: function(result) {
          /* You may add your own implementation here */
          location.reload();
        },
        onError: function(result) {
          /* You may add your own implementation here */
          location.reload();
        },
        onClose: function() {
          /* You may add your own implementation here */
        }
      })
    });
  </script>

  {{-- Template Main JS File --}}
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>
