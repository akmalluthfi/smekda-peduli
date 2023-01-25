<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>@yield('title') - Smekda Peduli</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  {{-- Favicons --}}
  <link href="/favicon.ico" rel="icon" />
  <link href="/apple-touch-icon.png" rel="apple-touch-icon" />

  {{-- Vendor CSS Files --}}
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/icons/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

  {{-- My style --}}
  <link rel="stylesheet" href="/css/main.css">
</head>

<body>

  <main>
    <div class="container">
      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>@yield('code')</h1>
        <h2>@yield('message')</h2>
        <a class="btn" href="@yield('location', Request::is('admin*') ? '/admin' : '/')">Back to home</a>
        <img src="/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found" />
      </section>
    </div>
  </main>

</body>

</html>
