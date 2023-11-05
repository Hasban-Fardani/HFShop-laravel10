{{-- User Dashboard Layout --}}
<!DOCTYPE html>
<html lang="en">
@include('components.admin.head')

<body class="sb-nav-fixed">
  @php $user = auth()->user() @endphp

  @include('components.user.navbar')

  <div id="layoutSidenav">
    @include('components.user.sidebar')
    
    <div id="layoutSidenav_content">
      <main class="px-4 container-fluid">
        @yield('content')
      </main>
  
      @include('components.admin.footer')
    </div>
  
  </div>
  @include('components.admin.scripts')
  @yield('custom_js')
</body>

</html>
