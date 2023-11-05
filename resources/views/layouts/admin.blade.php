{{-- Admin Layout --}}
<!DOCTYPE html>
<html lang="en">
@include('components.admin.head')

<body class="sb-nav-fixed">
  @php $user = auth()->user() @endphp

  @include('components.admin.navbar')

  <div id="layoutSidenav">
    @include('components.admin.sidebar')
    
    <div id="layoutSidenav_content">
      <main class="p-4 container-fluid">
        @if ($msg = session("success"))
          <div class="alert alert-success" role="alert">{{ $msg }}</div>
        @endif
        @if ($msg = session("failed"))
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
