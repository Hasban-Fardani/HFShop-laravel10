<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
  <div class="text-light container">
    <div class="w-100 d-flex justify-content-between">
      <div>
        <i class="fa fa-envelope mx-2"></i>
        <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
        <i class="fa fa-phone mx-2"></i>
        <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
      </div>
      <div>
        <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
            class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
        <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
            class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
        <a class="text-light" href="https://twitter.com/" target="_blank"><i
            class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
        <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
            class="fab fa-linkedin fa-sm fa-fw"></i></a>
      </div>
      <div>
        @if (Route::has('login'))
          <div class="position-fixed end-0 top-0 p-3 text-end">
            @auth
              <a href="{{ url('/home') }}" class="fw-bold text-muted hover:text-dark text-decoration-none">Home</a>
            @else
              <a href="{{ route('login') }}" class="fw-bold text-muted hover:text-dark text-decoration-none">Log in</a>

              @if (Route::has('register'))
                <a href="{{ route('register') }}"
                  class="fw-bold text-muted hover:text-dark text-decoration-none ms-3">Register</a>
              @endif
            @endauth
          </div>
        @endif
      </div>
    </div>
  </div>
</nav>
<!-- Close Top Nav -->
