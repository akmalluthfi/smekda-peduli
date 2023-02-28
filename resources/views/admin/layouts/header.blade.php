<header id="header"
  class="header fixed-top d-flex align-items-center justify-content-between bg-dark-blue navbar-dark">

  <a href="/" class="logo d-flex align-items-center order-1 order-lg-0">
    <img src="/apple-touch-icon.png" alt="Logo Smekda Peduli" />
    <span class="text-white">Smekda Peduli</span>
  </a>

  <i class="bi bi-list toggle-sidebar-btn order-0 order-lg-1 ps-0 ps-lg-2"></i>

  <nav class="header-nav order-2 ms-lg-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="{{ auth()->user()->picture ? asset('storage/' . auth()->user()->picture) : '/img/default.png' }}"
            alt=" Profile" class="rounded-circle" />
          <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
        </a>
        {{-- End Profile Image Icon --}}

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{ auth()->user()->name }}</h6>
            <span>Admin</span>
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

          <li>
            <a class="dropdown-item d-flex align-items-center" href="/">
              <i class="bi bi-house me-2"></i>
              <span>Home</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider" />
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
              @csrf
              <button type="submit" class="dropdown-item d-flex align-items-center text-danger" href="/logout">
                <i class="bi bi-box-arrow-right me-2"></i>
                <span>Keluar</span>
              </button>
            </form>
          </li>
        </ul>
        {{-- End Profile Dropdown Items --}}
      </li>
      {{-- End Profile Nav --}}
    </ul>
  </nav>

</header>
