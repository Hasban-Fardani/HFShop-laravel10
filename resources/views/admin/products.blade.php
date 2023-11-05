@extends('layouts.admin')

@section('content')
  <div class="">

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

      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>
              <div>
                <x-partials.image-card href="#" :src="$product->image" title="edit"
                  width="50"></x-partials.image-card>
              </div>
            </td>
            <td>{{ $product->name }}</td>
            <td>Rp{{ number_format($product->price, 2, ',', '.') }}</td>
            <td>{{ $product->category->name }}</td>

            <td>
              <div class="d-flex gap-2" style="width: 100px">
                <a href="{{ route("admin.products.show", $product->id) }}" class="btn btn-primary">
                  @include('icons.view')
                </a>
                <a href="{{ route('admin.products.edit', $product->id)}}" class="btn btn-warning">
                  @include('icons.edit')
                </a>
                <form action="{{ route("admin.products.destroy", $product->id) }}" method="post" onsubmit="confirmDelete('{{$product->name}}')">
                  @csrf
                  @method("DELETE")
                  <button type="submit" class="btn btn-danger">
                    @include('icons.delete')
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@section('custom_js')
  <script src="{{ asset('assets/sbadmin/js/datatables-products.js') }}"></script>
  <script>
    function confirmDelete(name) {
      let ans = confirm("are you sure to delete " + name + " ?")
      if (!ans) {
        event.preventDefault();
      }
    }
  </script>
@endsection
