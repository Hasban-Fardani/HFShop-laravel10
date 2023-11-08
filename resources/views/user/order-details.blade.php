@extends('layouts.user')

@section('content')
  <div class="card p-2">
    <div class="card-body">
      <h3>Order detail #{{ $order->id }}</h3>
      <div class="d-flex gap-4 p-2">
        <div>
          <img src="{{ $order->product->image }}" alt="" width="300">
        </div>
        <div class="d-flex flex-column gap-1">
          <div>
            <h6>Product Name</h6>
            <p>{{ $order->product->name }}</p>
          </div>
          <div>
            <h6>price</h6>
            <p>Rp{{ number_format($order->product->price) }}</p>
          </div>
          <div>
            <h6>Quantity</h6>
            <p>{{ $order->quantity }}</p>
          </div>
          <div>
            <h6>Shipping price</h6>
            <p>Rp{{ number_format($order->expeditionPrice->price) }}</p>
          </div>
          <div>
            <h6>Total</h6>
            <p>Rp{{ number_format($order->total) }}</p>
          </div>
        </div>
      </div>
      <h3 class="mt-2">Give Feedback</h3>
        @php
          $user = auth()->user()
        @endphp
      @if (isset($feedback))
      <p>update feedback</p>
        <form action="{{ route('user.feedback.update', $feedback->id) }}" method="POST">
          @csrf
          @method("PUT")
          {{-- <input type="number" name="product_id" id="" value="{{ $order->product->id }}" hidden disabled> --}}
          <input type="number" name="user_id" id="" value="{{ $user->id }}" hidden disabled>
          <label for="">Rating</label>
          <input type="number" name="rating" id="" class="form-control" placeholder="1 - 10" value="{{ $feedback->rating }}" required>
          <label for="" class="mt-2">Commnet</label>
          <textarea name="comment" id="" cols="30" rows="10" class="form-control"
            placeholder="this product is very ...">{{ $feedback->comment }}</textarea>
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
      @else
        <form action="{{ route('user.feedback.store', $order->product->id) }}" method="POST">
          @csrf
          {{-- <input type="number" name="product_id" id="" value="{{ $order->product->id }}" hidden disabled> --}}
          <input type="number" name="user_id" id="" value="{{ auth()->user()->id }}" hidden disabled>
          <label for="">Rating</label>
          <input type="number" name="rating" id="" class="form-control" placeholder="1 - 10" required>
          <label for="" class="mt-2">Commnet</label>
          <textarea name="comment" id="" cols="30" rows="10" class="form-control"
            placeholder="this product is very ..."></textarea> 
            {{-- <br> --}}
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
      @endif

    </div>
  </div>
@endsection
