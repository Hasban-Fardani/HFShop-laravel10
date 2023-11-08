@extends('layouts.user')

@section('content')
  <h1>Order</h1>
  @php $user = auth()->user() @endphp
  <div class="card w-75 shadow">
    <div class="card-body container">
      <div class="row">
        <div class="col-12 mb-3">
          <img src="{{ $data->product->image }}" alt="" width="300">
        </div>
      </div>
      <div class="row">
        <div class="col-2">Name</div>
        <div class="col-1">:</div>
        <div class="col-6">{{ $data->product->name }}</div>
      </div>
      <div class="row">
        <div class="col-2">Description</div>
        <div class="col-1">:</div>
        <div class="col-6">{{ $data->product->description }}</div>
      </div>
      <div class="row">
        <div class="col-2">Price</div>
        <div class="col-1">:</div>
        <div class="col-6">{{ $data->product->price }}</div>
      </div>
      <div class="row">
        <div class="col-2">Quantity</div>
        <div class="col-1">:</div>
        <div class="col-6">{{ $data->quantity }}</div>
      </div>
      <div class="row">
        <div class="col-2">Total</div>
        <div class="col-1">:</div>
        <div class="col-6">{{ $data->product->price * $data->quantity }}</div>
      </div>

      <div class="row mt-3">
        <form action="{{ route('order.store') }}" method="post">
          @csrf
          <input type="number" name="quantity" value="{{ $data->quantity }}" hidden>
          <input type="number" name="total" value="{{ $data->product->price * $data->quantity }}" hidden>
          <input type="number" name="user_id" value="{{ $user->id }}" hidden>
          <input type="number" name="seller_id" value="{{ $data->product->seller_id }}" hidden>
          <input type="number" name="product_id" value="{{ $data->product->id }}" hidden>

          {{--  --}}
          {{-- {{ $data->id }} --}}
          <input type="number" name="cart_id" value="{{ $data->id }}" hidden>

          <label for="promo_code">Enter Promo Code</label>
          <input type="number" name="promo_code" class="form-control" value="">

          <label for="expedition_id">Select Expedition</label>
          <select name="expedition_price_id" id="" class="form-select">
            @foreach ($expeditions_prices as $expedition_price)
              @if ($expedition_price->city_from_id == $data->product->seller->city_id)
                <option value="{{ $expedition_price->id }}">{{ $expedition_price->name }} -
                  Rp{{ $expedition_price->price }}</option>
              @endif
            @endforeach
          </select>

          <button type="submit" class="btn btn-primary mt-3">order</button>
        </form>
      </div>

    </div>
  </div>
@endsection
