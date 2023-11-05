<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
  <div class="d-flex justify-content-between align-items-center container">

    <a class="navbar-brand logo h1 align-self-center" href="/">
      HF Shop
    </a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="align-self-center navbar-collapse flex-fill d-lg-flex justify-content-lg-between collapse"
      id="templatemo_main_nav">
      <div class="flex-fill">
        <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
          @auth
            <li class="nav-item">
              <a class="nav-link" href="/user">Dashboard</a>
            </li>
          @endauth
          {{-- <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
        </ul>
      </div>
      @auth
      @else
        <div class="navbar align-self-center d-flex">
          <div class="">
            <a href="{{ route('login') }}" class="nav-icon position-relative text-decoration-none">Log in</a>
            <a href="{{ route('register') }}" class="nav-icon position-relative text-decoration-none">Register</a>
          </div>
        </div>
      @endauth
      <div class="navbar align-self-center d-flex">
        <div class="d-lg-none flex-sm-fill col-7 col-sm-auto mb-4 mt-3 pr-3">
          <div class="input-group">
            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
            <div class="input-group-text">
              <i class="fa fa-fw fa-search"></i>
            </div>
          </div>
        </div>

        @auth
          <a class="nav-icon position-relative text-decoration-none" href="#">
            <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
            {{-- <span class="position-absolute left-100 translate-middle badge rounded-pill bg-light text-dark top-0">7</span> --}}
          </a>
          <a class="nav-icon position-relative text-decoration-none" href="{{ route('user.profile') }}">
            <i class="fa fa-fw fa-user text-dark mr-3"></i>
            {{ Auth::user()->name }}
            {{-- <span
              class="position-absolute left-100 translate-middle badge rounded-pill bg-light text-dark top-0">+99</span> --}}
          </a>
        @endauth
      </div>
    </div>

  </div>
</nav>
<!-- Close Header -->

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="w-100 mb-5 pt-1 text-right">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="/products" method="get" class="modal-content modal-body border-0 p-0">
      <div class="input-group mb-2">
        <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
        <button type="submit" class="input-group-text bg-success text-light">
          <i class="fa fa-fw fa-search text-white"></i>
        </button>
      </div>
    </form>
  </div>
</div>
{{-- End modal --}}
