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
  <style>
    body {
      font-family: "Open Sans", sans-serif;
      background: #f6f9ff;
      color: #444444;
    }

    .error-404 {
      padding: 30px;
    }

    .error-404 h1 {
      font-size: 180px;
      font-weight: 700;
      color: #4154f1;
      margin-bottom: 0;
      line-height: 150px;
    }

    .error-404 h2 {
      font-size: 24px;
      font-weight: 700;
      color: #012970;
      margin-bottom: 30px;
    }

    .error-404 .btn {
      background: #51678f;
      color: #fff;
      padding: 8px 30px;
    }

    .error-404 .btn:hover {
      background: #3e4f6f;
    }

    @media (min-width: 992px) {
      .error-404 img {
        max-width: 50%;
      }
    }
  </style>
</head>

<body>

  <main>
    <div class="container">
      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>@yield('code')</h1>
        <h2>@yield('message')</h2>
        <a class="btn" href="index.html">Back to home</a>
        <img src="/assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found" />
      </section>
    </div>
  </main>

</body>

</html>
