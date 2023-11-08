@extends("layouts.user")

@section("content")
  <form action="{{route('pay', $order->id)}}" method="post" class="container">
    @csrf
    <label for="order_id">Order ID</label>
    <input type="number" name="order_id" id="order_id" class="form-control" disabled value="{{ $order->id }}">
    <label for="amount">Enter amount</label>
    <input type="number" name="amount" id="amount" class="form-control">
    <button type="submit" class="mt-2 btn btn-primary">Pay</button>
  </form>
@endsection