{{-- Admin Layout --}}
<!DOCTYPE html>
<html lang="en">
@include('components.admin.head')

<body class="sb-nav-fixed">
  {{ $user = auth()->user() }}

  @include('components.admin.navbar')

  <div id="layoutSidenav">
    @include('components.admin.sidebar')
    
    <div id="layoutSidenav_content">
      <main class="px-4">
        @yield('content')
      </main>
  
      @include('components.admin.footer')
    </div>
  
  </div>
  @include('components.admin.scripts')
  @yield('custom_js')
</body>

</html>
