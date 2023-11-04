<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">
        <div class="sb-sidenav-menu-heading">Main</div>
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Dashboard
        </a>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
          aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
          Products
          <div class="sb-sidenav-collapse-arrow">
            @include('icons.dropdown')
          </div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route('admin.products') }}">Products List</a>
            <a class="nav-link" href="layout-sidenav-light.html">Add Product</a>
            <a class="nav-link" href="layout-sidenav-light.html">Edit Product</a>
          </nav>
        </div>

        <div class="sb-sidenav-menu-heading">Custommers</div>

        <a class="nav-link" href="#">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Orders
        </a>
        
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
          aria-expanded="false" aria-controls="collapsePages">
          <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
          Feedbacks
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
          aria-expanded="false" aria-controls="collapsePages">
          <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
          Messages
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <div class="sb-sidenav-menu-heading">Other</div>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
          aria-expanded="false" aria-controls="collapsePages">
          <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
          Account Setting
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        {{-- <div class="sb-sidenav-menu-heading">Addons</div>
        <a class="nav-link" href="charts.html">
          <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
          Charts
        </a>
        <a class="nav-link" href="tables.html">
          <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
          Tables
        </a> --}}
      </div>
    </div>
    <div class="sb-sidenav-footer">
      <a href="" class="text-decoration-none text-white">
        <div class="small">Logged in as:</div>
        {{ $user->name }}
      </a>
    </div>
  </nav>
</div>
