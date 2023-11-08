@extends('layouts.admin')

@section('content')
  <table id="datatablesSimple">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>customer</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Order Time</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($orders as $order)
        <tr>
          <td><a href="">{{ $order->id }}</a></td>
          <td>
            {{ $order->user->name }}
          </td>
          <td>
            <a href="{{ route('admin.products.show', $order->product->id) }}">{{ $order->product->id }} - {{ $order->product->name }}</a>
          </td>
          <td>{{ $order->quantity }}</td>
          <td>
            {{ $order->created_at }}
          </td>
          <td>
            {{ $order->status }}
            @if ($order->status == 'menunggu pembayaran dikonfirmasi')
              <div class="d-flex gap-1">
                <form action="{{ route('admin.order.accept', $order->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-success" name="order_id" value="{{ $order->id }}">
                    @include('icons.check')
                  </button>
                </form>
                <form action="{{ route('admin.order.decline') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-danger" name="order_id" value="{{ $order->id }}">
                    @include('icons.delete')
                  </button>
                </form>
              </div>
            @endif
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection
