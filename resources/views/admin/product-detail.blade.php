@extends('layouts.admin')

@section('content')
  <div class="p-2">
    {{-- change href to route back  --}}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="text-center">
        <img src="{{ $product->image }}" alt="" width="500">
      </div>
      <table class="mt-5 table">
        <tr>
          <td>
            <h5>Name</h5>
          </td>
          <td>{{ $product->name }}</td>
        </tr>
        <tr>
          <td>
            <h5>Description</h5>
          </td>
          <td>
            <p>{{ $product->description }}</p>
          </td>
        </tr>
        <tr>
          <td>
            <h5>Price</h5>
          </td>
          <td>
            <p>{{ $product->price }}</p>
          </td>
        </tr>
        <tr>
          <td>
            <h5>Category</h5>
          </td>
          <td>
            <p>{{ $product->category->name }}</p>
          </td>
        </tr>
        <tr>
          <td>
            <h5>Promo</h5>
          </td>
          <td>
            <p>{{ $product->promo }}</p>
          </td>
        </tr>
        <tr>
          <td>
            <h5>Last Update At</h5>
          </td>
          <td>
            <p>{{ $product->updated_at }}</p>
          </td>
        </tr>
        <tr>
          <td>
            <h5>Create At</h5>
          </td>
          <td>
            <p>{{ $product->created_at }}</p>
          </td>
        </tr>
        <tr>
          <td>
            <h5>Product Order</h5>
          </td>
          <td><a href="">Go to products order</a></td>
        </tr>
      </table>
    </div>
  </div>
@endsection
