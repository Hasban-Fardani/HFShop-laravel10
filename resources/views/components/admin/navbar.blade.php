<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
  <!-- Navbar Brand-->
  <a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">HF Shop Admin</a>
  <!-- Sidebar Toggle-->
  <button class="btn btn-link btn-sm order-lg-0 me-lg-0 order-1 me-4" id="sidebarToggle" href="#!">
    @include('icons.toggler')
  </button>
  <!-- Navbar Search-->
  <form class="d-none d-md-inline-block form-inline me-md-3 my-md-0 my-2 me-0 ms-auto">
    <div class="input-group">
      <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
        aria-describedby="btnNavbarSearch" />
      <button class="btn btn-primary" id="btnNavbarSearch" type="button">
        @include('icons.search')
      </button>
    </div>
  </form>
  <!-- Navbar-->
  <ul class="navbar-nav ms-md-0 me-lg-4 me-3 ms-auto">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
      @include("icons.toggle-dropdown")  
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="#!">Settings</a></li>
        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
        <li>
          <hr class="dropdown-divider" />
        </li>
        <li>
          <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
            @csrf
            <button type="submit" class="dropdown-item">Logout</button>
          </form>
        </li>
      </ul>
    </li>
  </ul>
</nav>
