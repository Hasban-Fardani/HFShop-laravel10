<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
  @include('components.head-content')
</head>

<body>
  {{-- @include("components.navbar") --}}

  @include('components.header')

  @yield('content')

  @include('components.footer')

  @include('components.scripts')
</body>

</html>
