<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">
        {{-- <a class="nav-link" href="/">Home</a> --}}
        <div class="sb-sidenav-menu-heading">Main</div>
        <a class="nav-link" href="/">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Home
        </a>
        <a class="nav-link {{ Route::is("user.dashboard") ? 'active' : ''}}" href="{{ route('user.dashboard')}}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Dashboard
        </a>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
          aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
          Orders
          <div class="sb-sidenav-collapse-arrow">
            @include('icons.dropdown')
          </div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route('admin.products.index') }}">My Orders</a>
            <a class="nav-link" href="{{ route('admin.products.create') }}">Feedbacks</a>
          </nav>
        </div>
        <a class="nav-link {{ Route::is("user.cart") ? 'active' : ''}}" href="{{route('user.cart')}}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Cart
        </a>

        <div class="sb-sidenav-menu-heading">Other</div>

        <a class="nav-link {{ Route::is("user.profile") ? 'active' : ''}}" href="{{route('user.profile')}}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Profile
        </a>
        
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
