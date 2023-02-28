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
      <a class="nav-link {{ Request::is('admin/comments*') ? 'active' : '' }}" href="/admin/comments">
        <i class="bi bi-chat-left-dots-fill"></i>
        <span>Comment</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ Request::is('admin/faqs*') ? 'active' : '' }}" href="/admin/faqs">
        <i class="bi bi-question-circle"></i>
        <span>FAQs</span>
      </a>
    </li>

  </ul>
</aside>
