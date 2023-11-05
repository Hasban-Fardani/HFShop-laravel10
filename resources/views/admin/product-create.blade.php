@extends('layouts.admin')

@section('content')
  <form method="POST" action="{{ route('admin.products.store') }}">
    <div class="mb-3">
      <label for="name" class="form-label">Product Name</label>
      <input type="name" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="decription" class="form-label">Description</label>
      <textarea type="password" class="form-control" id="decription" name="description" required></textarea>
    </div>
    {{-- <div class="form-check mb-3">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
