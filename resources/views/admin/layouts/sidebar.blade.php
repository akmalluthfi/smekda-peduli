<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="/admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/campaigns*') ? 'active' : '' }}" href="/admin/campaigns">
                <i class="bi bi-flag"></i>
                <span>Campaign</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/payments*') ? 'active' : '' }}" href="/admin/payments">
                <i class="bi bi-credit-card"></i>
                <span>Metode Pembayaran</span>
            </a>
        </li>

    </ul>
</aside>
