@extends('layouts.default')

@section('content')
  <div class="py-2">
    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-md-6">

          <!-- Login form -->
          <form class="row g-3 rounded bg-white p-4 shadow" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="col-12">
              <h1 class="text-primary text-center">Selamat Datang</h1>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" autocomplete="email" autofocus
                placeholder="Masukkan email Anda" required>
            </div>
            <div class="col-12">
              <label for="password" class="form-label">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password">
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                  {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="form-check-label">Ingat saya</label>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
            <div class="col-12 text-center">
              <p class="mt-3">Belum punya akun? <a href="#" class="text-decoration-none">Daftar sekarang</a></p>
              @if (Route::has('password.request'))
                <p>Lupa password? <a href="#" class="text-decoration-none">Reset disini</a></p>
              @endif
            </div>
          </form>

          <!-- Custom CSS -->
          <style>
            form {
              max-width: 500px;
              margin: auto;
            }
          </style>
        </div>
      </div>
    </div>
  </div>
@endsection
