@extends("layouts.user")

@section("content")
<h1 class="mb-2">My Cart</h1>
<table id="datatablesSimple">
  <thead>
    <tr>
      <th>Image</th>
      <th>Name</th>
      <th>Price</th>
      <th>Count</th>
      <th>Total</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($carts as $cart)
    <tr>
      <td>
        <x-partials.image-card href="/user" :src="$cart->product->image" title="detail" width="50"></x-partials.image-card>
      </td>
      <td>{{ $cart->product->name }}</td>
      <td>Rp{{ number_format($cart->product->price, 2, ',', '.') }}</td>
      <td>{{ $cart->quantity }}</td>
      <td>Rp{{ number_format($cart->quantity * $cart->product->price) }}</td>
      <td>
        <div class="d-flex gap-2" style="width: 150px">
          <a href="{{ route("user.cart.edit", $cart->id) }}" class="btn btn-warning">@include("icons.edit")</a>
          <a href="{{ route("order", $cart->id) }}" class="btn btn-primary">
            @include("icons.money")
          </a>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection