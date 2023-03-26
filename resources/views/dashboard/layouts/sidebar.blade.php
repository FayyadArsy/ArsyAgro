<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/notas*') ? 'active' : '' }}" href="/dashboard/notas">
            <span data-feather="file-text" class="align-text-bottom"></span>
            MyNota
          </a>
        </li>
      </ul>

    @can('admin')
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Admin Page</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/hutang*') ? 'active' : '' }}" href="/dashboard/hutang">
            <span data-feather="grid" class="align-text-bottom"></span>
            Pelanggan
          </a>
      </li>
      <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/trips*') ? 'active' : '' }}" href="/dashboard/trips">
            <span data-feather="grid" class="align-text-bottom"></span>
            Trip
          </a>
      </li>
    </ul>
  @endcan

    </div>
  </nav>