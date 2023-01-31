<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title') - Smekda Peduli</title>

  <meta content="Donation App" name="description" />
  <meta content="Donation App" name="keywords" />

  {{-- Favicons --}}
  <link href="/favicon.ico" rel="icon" />
  <link href="/apple-touch-icon.png" rel="apple-touch-icon" />

  {{-- Vendor CSS Files --}}
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  {{-- My style --}}
  <link rel="stylesheet" href="/css/main.css">

</head>

<body>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div
              class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                  <img src="/img/logo.png" alt="Logo smekda peduli" />
                  <span class="d-none d-lg-block">Smekda Peduli</span>
                </a>
              </div>

              @yield('content')
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>
