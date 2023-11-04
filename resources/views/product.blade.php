@extends('layouts.default')

@section('content')
  <!-- Start Content -->
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-3">
        <h1 class="h2 pb-4">Categories</h1>
        <ul class="list-unstyled templatemo-accordion">
          @foreach ($product_category_groups as $category_group)
            <li class="pb-3">
            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
              {{ $category_group->name }}
              <i class="fa fa-fw fa-chevron-circle-down mt-1"></i>
            </a>
            <ul class="show list-unstyled collapse pl-3">
              @foreach ($product_categories as $category)
              {{-- {{ $category->category_group_id }}
              {{ $category_group->id}} --}}
              @if ($category->category_group_id == $category_group->id)
                  <li><a class="text-decoration-none" href="#">{{ $category->name }}</a></li>
                @endif
              @endforeach
            </ul>
          </li>
          @endforeach
          
          {{-- <li class="pb-3">
            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
              Sale
              <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
            </a>
            <ul id="collapseTwo" class="list-unstyled collapse pl-3">
              <li><a class="text-decoration-none" href="#">Sport</a></li>
              <li><a class="text-decoration-none" href="#">Luxury</a></li>
            </ul>
          </li>
          <li class="pb-3">
            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
              Product
              <i class="pull-right fa fa-fw fa-chevron-circle-down mt-1"></i>
            </a>
            <ul id="collapseThree" class="list-unstyled collapse pl-3">
              <li><a class="text-decoration-none" href="#">Bag</a></li>
              <li><a class="text-decoration-none" href="#">Sweather</a></li>
              <li><a class="text-decoration-none" href="#">Sunglass</a></li>
            </ul>
          </li> --}}
        </ul>
      </div>

      <div class="col-lg-9">
        <div class="row">
          <div class="col-md-6">
            <ul class="list-inline shop-top-menu pb-3 pt-1">
              <li class="list-inline-item">
                <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
              </li>
              <li class="list-inline-item">
                <a class="h3 text-dark text-decoration-none mr-3" href="#">Fisik</a>
              </li>
              <li class="list-inline-item">
                <a class="h3 text-dark text-decoration-none" href="#">Digital</a>
              </li>
            </ul>
          </div>
          <div class="col-md-6 pb-4">
            <div class="d-flex">
              <select class="form-control">
                <option>Featured</option>
                <option>A to Z</option>
                <option>Item</option>
              </select>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center flex-col flex-wrap gap-3">
          @foreach ($products as $product)
            <x-partials.product-card :id="$product->id" :name="$product->name" :price="$product->price" :rating="$product->rating"
              :image="$product->image" />
          @endforeach


        </div>
        <div div="row">
          <ul class="pagination pagination-lg justify-content-end">
            @for ($i = 1; $i <= $pages; $i++)
              <li class="page-item">
                <a class="page-link {{ request('page') == $i || ($i === 1 && !request()->has('page')) ? 'active' : '' }} rounded-0 border-top-0 border-left-0 text-dark mr-3 shadow-sm"
                  href="{{ route('products.index', ['page' => $i]) }}">{{ $i }}</a>
              </li>
            @endfor
          </ul>
        </div>
      </div>

    </div>
  </div>
  <!-- End Content -->

  <!-- Start Brands -->
  <section class="bg-light py-5">
    <div class="container my-4">
      <div class="row py-3 text-center">
        <div class="col-lg-6 m-auto">
          <h1 class="h1">Our Brands</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            Lorem ipsum dolor sit amet.
          </p>
        </div>
        <div class="col-lg-9 tempaltemo-carousel m-auto">
          <div class="row d-flex flex-row">
            <!--Controls-->
            <div class="col-1 align-self-center">
              <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                <i class="text-light fas fa-chevron-left"></i>
              </a>
            </div>
            <!--End Controls-->

            <!--Carousel Wrapper-->
            <div class="col">
              <div class="carousel slide carousel-multi-item pt-md-0 pt-2" id="multi-item-example"
                data-bs-ride="carousel">
                <!--Slides-->
                <div class="carousel-inner product-links-wap" role="listbox">

                  <!--First slide-->
                  <div class="carousel-item active">
                    <div class="row">
                      <div class="col-3 p-md-5">
                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png"
                            alt="Brand Logo"></a>
                      </div>
                      <div class="col-3 p-md-5">
                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png"
                            alt="Brand Logo"></a>
                      </div>
                      <div class="col-3 p-md-5">
                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png"
                            alt="Brand Logo"></a>
                      </div>
                      <div class="col-3 p-md-5">
                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png"
                            alt="Brand Logo"></a>
                      </div>
                    </div>
                  </div>
                  <!--End First slide-->

                  <!--Second slide-->
                  <div class="carousel-item">
                    <div class="row">
                      <div class="col-3 p-md-5">
                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png"
                            alt="Brand Logo"></a>
                      </div>
                      <div class="col-3 p-md-5">
                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png"
                            alt="Brand Logo"></a>
                      </div>
                      <div class="col-3 p-md-5">
                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png"
                            alt="Brand Logo"></a>
                      </div>
                      <div class="col-3 p-md-5">
                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png"
                            alt="Brand Logo"></a>
                      </div>
                    </div>
                  </div>
                  <!--End Second slide-->

                  <!--Third slide-->
                  <div class="carousel-item">
                    <div class="row">
                      <div class="col-3 p-md-5">
                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png"
                            alt="Brand Logo"></a>
                      </div>
                      <div class="col-3 p-md-5">
                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png"
                            alt="Brand Logo"></a>
                      </div>
                      <div class="col-3 p-md-5">
                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png"
                            alt="Brand Logo"></a>
                      </div>
                      <div class="col-3 p-md-5">
                        <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png"
                            alt="Brand Logo"></a>
                      </div>
                    </div>
                  </div>
                  <!--End Third slide-->

                </div>
                <!--End Slides-->
              </div>
            </div>
            <!--End Carousel Wrapper-->

            <!--Controls-->
            <div class="col-1 align-self-center">
              <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                <i class="text-light fas fa-chevron-right"></i>
              </a>
            </div>
            <!--End Controls-->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--End Brands-->
@endsection
