<nav class="navbar fixed-top navbar-expand-md bg-dark-blue navbar-dark shadow-sm">
  <div class="container-fluid px-4">
    <a class="navbar-brand order-1 order-md-0 me-0" href="/">
      <img src="/apple-touch-icon.png" alt="Logo Smekda Peduli" height="28" class="d-inline-block align-text-top">
      <span class="fw-bold">Smekda Peduli</span>
    </a>

    <button class="navbar-toggler order-0 order-md-1" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="order-3 order-md-2 collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
      <ul class="navbar-nav">
        <li class="nav-item px-3">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link {{ Request::is('campaigns*') ? 'active' : '' }}" href="/campaigns">Campaign</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link {{ Request::is('user/donations*') ? 'active' : '' }}" href="/user/donations">Donasi
            Saya</a>
        </li>
      </ul>
    </div>

    <div class="order-2 order-md-3">
      @guest
        <a href="/login" class="btn btn-outline-light">Masuk</a>
        <a href="/registration" class="btn btn-blue border d-none d-md-inline-block ms-2">Daftar</a>
      @endguest

      @auth
        <div class="dropdown position-relative">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ auth()->user()->picture ? asset('storage/' . auth()->user()->picture) : '/img/default.png' }}"
              alt="{{ auth()->user()->name }} Profile Picture" class="rounded-circle" height="40" />
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile user">
            <li class="dropdown-header">
              <h6>{{ auth()->user()->name }}</h6>
              <span>{{ auth()->user()->is_admin ? 'Admiin' : 'User' }}</span>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/user">
                <i class="bi bi-person me-2"></i>
                <span>Profile Saya</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            @if (auth()->user()->is_admin)
              <li>
                <a class="dropdown-item d-flex align-items-center" href="/admin">
                  <i class="bi bi-house me-2"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
            @endif

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/faq">
                <i class="bi bi-question-circle me-2"></i>
                <span>FAQs</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>

            <li>
              <form action="/logout" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="dropdown-item d-flex align-items-center text-danger" href="/logout">
                  <i class="bi bi-box-arrow-right me-2"></i>
                  <span>Keluar</span>
                </button>
              </form>
            </li>
          </ul>

        </div>
      @endauth
    </div>

  </div>
</nav>
