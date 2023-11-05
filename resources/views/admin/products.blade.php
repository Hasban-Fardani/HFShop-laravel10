@extends('layouts.admin')

@section('content')
  <table id="datatablesProducts">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Categories</th>
        <th>Action</th>
      </tr>
    </thead>

    {{-- <tfoot>
      <tr>
        <th>Name</th>
        <th>Categories</th>
        <th>Price</th>
        <th>Age</th>
        <th>Start date</th>
        <th>Salary</th>
        <th>Action</th>
      </tr>
    </tfoot> --}}
    <tbody>
      @foreach ($products as $product)
      <tr>
        <td>
          <x-partials.image-card href="#" :src="$product->image" title="edit" width="50"></x-partials.image-card>
          {{-- <img src="{{ $product->image }}" alt="{{ $product->name}} image" width="100"> --}}
        </td>
        <td>{{ $product->name }}</td>
        <td>Rp{{ number_format($product->price, 2, ',', '.') }}</td>
        <td>{{ $product->category_id }}</td>
        
        <td>
          <div class="d-flex gap-2" style="width: 150px">
            <a href="" class="btn btn-primary">Detail</a>
            <a href="" class="btn btn-warning">Edit</a>
            <form action="" method="post">
              @csrf
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

@section('custom_js')
  <script src="{{ asset('assets/sbadmin/js/datatables-products.js') }}"></script>
@endsection
