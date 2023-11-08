<div class="card product-wap rounded-0 mb-4" style="width: 250px;">
  <div class="card rounded-0">
    <img class="card-img rounded-0 img-fluid" src="{{ $image != '' ? $image : 'https://picsum.photos/250' }}">
    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
      <ul class="list-unstyled">
        <li><a class="btn btn-success text-white" href=""><i class="far fa-heart"></i></a>
        </li>
        <li><a class="btn btn-success mt-2 text-white"href="{{ route('products.show', $id) }}"><i
              class="far fa-eye"></i></a>
        </li>
        <li><a class="btn btn-success mt-2 text-white" href="{{ route('products.show', $id)}}"><i class="fas fa-cart-plus"></i></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="card-body">
    <a href="{{ route('products.show', $id) }}" class="text-decoration-none">
      <h3>{{ $name }}</h3>
      <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
        <li class="pt-2">
          <span class="product-color-dot color-dot-red rounded-circle float-left ml-1"></span>
          <span class="product-color-dot color-dot-blue rounded-circle float-left ml-1"></span>
          <span class="product-color-dot color-dot-black rounded-circle float-left ml-1"></span>
          <span class="product-color-dot color-dot-light rounded-circle float-left ml-1"></span>
          <span class="product-color-dot color-dot-green rounded-circle float-left ml-1"></span>
        </li>
      </ul>
      <ul class="list-unstyled d-flex justify-content-center mb-1">
        <li>
          <i class="{{ $rating/2 >= 1 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
          <i class="{{ $rating/2 >= 2 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
          <i class="{{ $rating/2 >= 3 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
          <i class="{{ $rating/2 >= 4 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
          <i class="{{ $rating/2 >= 5 ? 'text-warning' : 'text-muted' }} fa fa-star"></i>
        </li>
      </ul>
      <p class="mb-0 text-center">Rp{{ number_format($price, 2, ',', '.') }}</p>
    </a>

  </div>
</div>
