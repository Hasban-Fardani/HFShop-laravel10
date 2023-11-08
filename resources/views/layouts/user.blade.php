{{-- User Dashboard Layout --}}
<!DOCTYPE html>
<html lang="en">
@include('components.user.head')

<body class="sb-nav-fixed">
  @php $user = auth()->user() @endphp

  @include('components.user.navbar')

  <div id="layoutSidenav">
    @include('components.user.sidebar')

    <div id="layoutSidenav_content">
      <main class="container-fluid p-4">
        @if ($msg = session('success'))
          <div class="alert alert-success" role="alert">{{ $msg }}</div>
        @endif
        @if ($msg = session('error'))
          <div class="alert alert-danger" role="alert">{{ $msg }}</div>
        @endif
        @yield('content')
      </main>

      @include('components.admin.footer')
    </div>

  </div>

  @include('components.admin.scripts')
  @yield('custom_js')
</body>

</html>
