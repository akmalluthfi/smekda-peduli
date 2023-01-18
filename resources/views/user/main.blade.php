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
  <link href="/icons/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  {{-- Template Main CSS File --}}
  <link href="/css/main.css" rel="stylesheet">

</head>

<body>

  @include('user.layouts.navbar')

  <main id="main-content">
    <div class="container">
      @yield('content')
    </div>
  </main>

  @include('user.layouts.footer')

  {{-- Template Main JS File --}}
  <script src="/js/bootstrap.bundle.min.js"></script>
  {{-- My script --}}
  @stack('scripts')
</body>

</html>
