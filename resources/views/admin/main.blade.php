<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.layouts.head')
</head>

<body>
  {{-- ======= Header ======= --}}
  @include('admin.layouts.header')
  {{-- End Header --}}

  {{-- ======= Sidebar ======= --}}
  @include('admin.layouts.sidebar')
  {{-- End Sidebar --}}

  <div class="d-flex flex-column justify-content-between min-vh-100" style="margin-top: -24px">
    <main id="main" class="main">

      @yield('content')

    </main>
    {{-- End #main --}}

    {{-- ======= Footer ======= --}}
    @include('admin.layouts.footer')
    {{-- End Footer --}}
  </div>

  {{-- button scroll to top --}}
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  @include('admin.layouts.foot')
</body>

</html>
