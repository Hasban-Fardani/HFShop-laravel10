@extends('layouts.admin')

@section('content')
<div class="col-10">
  <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Product Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="decription" class="form-label">Description</label>
      <textarea class="form-control" id="decription" name="description" required></textarea>
    </div>
    
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" class="form-control" id="price" name="price" required>
    </div>

    <div class="mb-3">
      <label for="stok" class="form-label">Stok</label>
      <input type="number" class="form-control" id="stok" name="stok" required>
    </div>

    <div class="mb-3">
      <label for="product_category_id" class="form-label">Category: </label>
      <select name="product_category_id" id="product_category_id" class="form-select" required>
        <option value="" disabled selected>Please Select Category</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Image: </label>
      <input type="file" name="image" id="image" class="form-control-file" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
