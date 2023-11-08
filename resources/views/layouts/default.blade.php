<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
  @include('components.head-content')
</head>

<body>
  {{-- @include("components.navbar") --}}

  @include('components.header')
  @php
    $user = auth()->user();
  @endphp
  @yield('content')

  @include('components.footer')

  @include('components.scripts')
  {{-- <script src="{{ asset('assets/sbadmin/js/scripts.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
  <script src="{{ asset('assets/sbadmin/js/datatables-simple-demo.js') }}"></script> --}}
</body>

</html>
