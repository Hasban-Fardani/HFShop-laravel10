<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">
        <div class="sb-sidenav-menu-heading">Main</div>
        <a class="nav-link" href="{{ route('index') }}">
          <div class="sb-nav-link-icon">@include('icons.home')</div>
          Home
        </a>
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <div class="sb-nav-link-icon">@include('icons.dashboard')</div>
          Dashboard
        </a>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
          aria-expanded="false" aria-controls="collapseLayouts">
          <div class="sb-nav-link-icon">@include('icons.box')</div>
          Products
          <div class="sb-sidenav-collapse-arrow">
            @include('icons.dropdown')
          </div>
        </a>
        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="{{ route('admin.products.index') }}">
              <span>
                Products List
              </span>
            </a>
            <a class="nav-link" href="{{ route('admin.products.create') }}">Add Product</a>
            <a class="nav-link" href="{{ route('admin.products.edit', 0) }}">Edit Product</a>
          </nav>
        </div>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2"
          aria-expanded="false" aria-controls="collapseLayouts2">
          <div class="sb-nav-link-icon">@include('icons.list')</div>
          Categories
          <div class="sb-sidenav-collapse-arrow">
            @include('icons.dropdown')
          </div>
        </a>
        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">
            <a class="nav-link" href="{{route("admin.categories.index")}}">Categories List</a>
            <a class="nav-link" href="{{route("admin.categories.create")}}">Add Categories</a>
            <a class="nav-link" href="#">Edit Categories</a>
          </nav>
        </div>

        <div class="sb-sidenav-menu-heading">Custommers</div>

        <a class="nav-link" href="{{ route("admin.order.index") }}">
          <div class="sb-nav-link-icon">@include('icons.dolly')</div>
          Orders
        </a>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
          aria-expanded="false" aria-controls="collapsePages">
          <div class="sb-nav-link-icon">@include('icons.comments')</div>
          Feedbacks
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
          aria-expanded="false" aria-controls="collapsePages">
          <div class="sb-nav-link-icon">@include('icons.message')</div>
          Messages
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <div class="sb-sidenav-menu-heading">Other</div>
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
          aria-expanded="false" aria-controls="collapsePages">
          <div class="sb-nav-link-icon">@include('icons.gear')</div>
          Account Setting
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
