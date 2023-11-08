@extends('layouts.admin')

@section('content')
  {{-- show categories details and show the products whitin that category --}}
  <div class="p-3">
    <a href="{{ url()->previous(route('admin.categories.index')) }}" class="btn btn-primary">Back</a>
    <div class="card">
      <div class="card-header">
        {{ $category->name }} Details
      </div>
      <div class="card-body">
        {{-- // show category details --}}
        <p>Name: {{ $category->name }}</p>
        <p>Description: {{ $category->description }}</p>
        <h3>Products</h3>
        @if ($category->products->count())
          <table class="table">
            <tr>
              <th>Name</th>
              <th>Price</th>
            </tr>
            @foreach ($category->products as $product)
              <tr>
                {{-- if product clicked its belong to product detail --}}
                <td>
                  <a href="{{ route('admin.products.show', $product->id) }}">
                    {{ $product->name }}
                  </a>

                </td>
                <td>{{ $product->price }}</td>
              </tr>
            @endforeach
          </table>
        @else
          <p>- No Products found -</p>
        @endif
      </div>
    </div>
    <div class="card-footer mt-2">
      <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
    </div>
  </div>
@endsection
