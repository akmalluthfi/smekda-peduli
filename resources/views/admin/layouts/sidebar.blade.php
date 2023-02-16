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
      <a class="nav-link {{ Request::is('admin/faqs*') ? 'active' : '' }}" href="/admin/faqs">
        <i class="bi bi-flag"></i>
        <span>FAQs</span>
      </a>
    </li>

  </ul>
</aside>
