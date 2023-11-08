@extends('layouts.user')

@section('content')
  <h1 class="mb-2">My Cart</h1>
  <table id="datatablesSimple">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Count</th>
        <th>Total</th>
        <th>Status</th>
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
            {{ $order->quantity }}
          </td>
          <td>
            Rp{{ number_format($order->total, 2, ',', '.') }}
          </td>
          <td>
            {{ $order->status }}
            @if ($order->status == "belum dibayar")
              <a href="{{ route('pay.create', $order->id) }}">Bayar</a>
            @endif
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection
