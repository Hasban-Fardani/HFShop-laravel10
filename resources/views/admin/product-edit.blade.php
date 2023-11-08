@extends('layouts.admin')

@section('content')
  <div class="col-10">
    <p>Apa</p>
    @can("admin-crud")
      <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
      @csrf
      @method("PUT")
      <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name}}" required>
      </div>
      <div class="mb-3">
        <label for="decription" class="form-label">Description</label>
        <textarea class="form-control" id="decription" name="description" required>{{$product->description}}</textarea>
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
      </div>

      <div class="mb-3">
        <label for="stok" class="form-label">Stok</label>
        <input type="number" class="form-control" id="stok" name="stok" value="{{ $product->stok }}" required>
      </div>

      <div class="mb-3">
        <label for="product_category_id" class="form-label">Category: </label>
        <select name="product_category_id" id="product_category_id" class="form-select" required>
          <option value="" disabled selected>Please Select Category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected($product->category->id == $category->id)>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Image: </label>
        <img src="{{ $product->image }}" alt="" width="200">
        <br><br>
        <label for="image" class="form-label">change </label>
        <input type="file" name="image" id="image" class="form-control-file">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endcan
  </div>
@endsection
