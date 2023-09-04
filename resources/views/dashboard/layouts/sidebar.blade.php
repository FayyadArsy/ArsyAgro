

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="font-size: 20px">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} d-flex align-items-center" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom" style="width: 20px; height: 20px"></span>
            Dashboard
        </a>
        
        </li>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Nota</span>
        </h6>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/nota') ? 'active' : '' }} d-flex align-items-center"  aria-current="page" href="/dashboard/nota">
            <span data-feather="file-text" class="align-text-bottom" style="width: 20px; height: 20px"></span>
            Semua Nota
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/notas*') ? 'active' : '' }} d-flex align-items-center" href="/dashboard/notas">
            <span data-feather="user" class="align-text-bottom" style="width: 20px; height: 20px"></span>
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
      <a class="nav-link {{ Request::is('dashboard/hutang*') ? 'active' : '' }} d-flex align-items-center" href="/dashboard/hutang">
            <span data-feather="list" class="align-text-bottom" style="width: 20px; height: 20px"></span>
            Pelanggan
          </a>
      </li>
      <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard/trips*') ? 'active' : '' }} d-flex align-items-center" href="/dashboard/trips">
            <span data-feather="grid" class="align-text-bottom" style="width: 20px; height: 20px"></span>
            Trip
          </a>
      </li>
    </ul>
  @endcan

    </div>
  </nav>