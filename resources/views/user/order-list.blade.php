@extends('layouts.user')

@section('content')
  <h1 class="mb-2">My Orders</h1>
  <table id="datatablesSimple">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Count</th>
        <th>Shipping</th>
        <th>Total</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

      @foreach ($orders as $order)
        <tr>
          <td>
            <img src="{{ $order->product->image }}" alt="" width="50">
          </td>
          <td>
            {{ $order->product->name }}
          </td>
          <td>
            Rp{{ number_format($order->product->price) }}
          </td>
          <td>
            {{ $order->quantity }}
          </td>
          <td>
            Rp{{ number_format($order->expeditionPrice->price) }}
            
          </td>
          <td>
            Rp{{ number_format($order->total, 2, ',', '.') }}
          </td>
          <td>
            {{ $order->status }}
            @if ($order->status == "belum dibayar")
              <a href="{{ route('pay.create', $order->id) }}">Bayar</a>
            {{-- @else --}}
            @endif
          </td>
          <td>

            <a href="{{ route('user.order.detail', $order->id) }}">detail</a>
          </td>
          
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection
