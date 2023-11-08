@extends('layouts.default')

@section('content')
  <section class="bg-light">

    <div class="container pb-5">
      <div class="row">
        <div class="col-lg-5 mt-5">
          <div class="card mb-3 px-1">
            <img class="card-img img-fluid" src="{{ $product->image }}" alt="{{ $product->name }}" id="product-detail">
          </div>
          <div class="row">
            <!--Start Controls-->
            <div class="col-1 align-self-center">
              <a href="#multi-item-example" role="button" data-bs-slide="prev">
                <i class="text-dark fas fa-chevron-left"></i>
                <span class="sr-only">Previous</span>
              </a>
            </div>
            <!--End Controls-->
            <!--Start Carousel Wrapper-->
            <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
              {{-- <!--Start Slides-->
              <div class="carousel-inner product-links-wap" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">
                  <div class="row">
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_01.jpg" alt="Product Image 1">
                      </a>
                    </div>
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_02.jpg" alt="Product Image 2">
                      </a>
                    </div>
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_03.jpg" alt="Product Image 3">
                      </a>
                    </div>
                  </div>
                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_04.jpg" alt="Product Image 4">
                      </a>
                    </div>
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_05.jpg" alt="Product Image 5">
                      </a>
                    </div>
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_06.jpg" alt="Product Image 6">
                      </a>
                    </div>
                  </div>
                </div>
                <!--/.Second slide-->

                <!--Third slide-->
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_07.jpg" alt="Product Image 7">
                      </a>
                    </div>
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_08.jpg" alt="Product Image 8">
                      </a>
                    </div>
                    <div class="col-4">
                      <a href="#">
                        <img class="card-img img-fluid" src="assets/img/product_single_09.jpg" alt="Product Image 9">
                      </a>
                    </div>
                  </div>
                </div>
                <!--/.Third slide-->
              </div>
              <!--End Slides--> --}}
            </div>
            <!--End Carousel Wrapper-->
            <!--Start Controls-->
            <div class="col-1 align-self-center">
              <a href="#multi-item-example" role="button" data-bs-slide="next">
                <i class="text-dark fas fa-chevron-right"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <!--End Controls-->
          </div>
        </div>
        <!-- col end -->
        <div class="col-lg-7 mt-5">
          <div class="card">
            <div class="card-body">
              @php
                $total_rating = 0;
                $count_rating = 0;
                foreach ($product->feedbacks as $feedback) {
                    $total_rating += $feedback->rating;
                    $count_rating += 1;
                }
              @endphp
              <h1 class="h2">{{ $product->name }}</h1>
              <p class="h3 py-2">Rp{{ number_format($product->price, 2, ',', '.') }}</p>
              <p class="py-2">
                <i class="{{ $total_rating / 2 >= 1 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
                <i class="{{ $total_rating / 2 >= 2 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
                <i class="{{ $total_rating / 2 >= 3 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
                <i class="{{ $total_rating / 2 >= 4 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
                <i class="{{ $total_rating / 2 >= 5 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
                {{-- {{ }} --}}
              <p class="list-inline-item text-dark">Rating {{ $total_rating / 2 }} customer |
                {{ $comments }}
                Comments</p>
              </p>

              <h6>Description:</h6>
              <div>{{ $product->description }}</div>
              <div class="d-flex mt-2">
                <p class="">Stok: </p>
                <p>{{ $product->stok }}</p>
              </div>
              <form action="{{ route('add.cart') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                @if (isset($user->id))
                  <input type="hidden" name="user_id" value="{{ $user->id }}">
                @endif

                <div class="row">
                  <div class="col-auto">
                    <ul class="list-inline pb-3">
                      <li class="list-inline-item text-right">
                        Quantity
                        <input type="hidden" name="quantity" id="quantity" value="1">
                      </li>
                      <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                      <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                      <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                    </ul>
                  </div>
                </div>
                <div class="row pb-3">
                  <div class="col d-grid">
                    <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                  </div>
                  <div class="col d-grid">
                    <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To
                      Cart</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="card mt-3">
          <div class="card-body">
            <h3>Costomers Feedbacks</h3>
            @if ($product->feedbacks->count())
              @foreach ($product->feedbacks as $feedback)
              <div class="card">
                <div class="card-body">
                  <h6>{{ $feedback->user->name }}</h6>
                  <div>
                    <i class="{{ $feedback->rating / 2 >= 1 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
                    <i class="{{ $feedback->rating / 2 >= 2 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
                    <i class="{{ $feedback->rating / 2 >= 3 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
                    <i class="{{ $feedback->rating / 2 >= 4 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
                    <i class="{{ $feedback->rating / 2 >= 5 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
                  </div>
                  {{ $feedback->comment }}
                </div>
              </div>
              @endforeach
            @else
              <p>-no customer feedbacks-</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
