<nav class="navbar fixed-top navbar-expand-md bg-white shadow-sm">
  <div class="container-fluid px-4">
    <a class="navbar-brand order-1 order-md-0 me-0" href="#">
      <img src="/apple-touch-icon.png" alt="Logo Smekda Peduli" height="26" class="d-inline-block align-text-top">
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
        <a href="/login" class="btn btn-outline-blue">Masuk</a>
        <a href="/registration" class="btn btn-blue d-none d-md-inline-block ms-2">Daftar</a>
      @endguest

      @auth
        <div class="dropdown">
          <a class="dropdown-toggle profile-toogle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="/img/default.png" alt=" Profile" class="rounded-circle" height="40" />
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/user">
                <i class="bi bi-person me-2"></i>
                <span>Profile Saya</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="user/settings">
                <i class="bi bi-gear me-2"></i>
                <span>Pengaturan</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/help">
                <i class="bi bi-question-circle me-2"></i>
                <span>Bantuan</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li>
              <form action="/logout" method="POST">
                @method('delete')
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
