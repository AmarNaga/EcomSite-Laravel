<!-- Start Most Popular -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Hot Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    <!-- Start Single Product -->
                    @foreach ($hotItem as $item)
                        <div class="single-product">
                            <div class="product-img">
                                <a href="/products/{{ $item->slug }}">
                                    <img class="default-img" src="{{ $item->image == '' ? 'https://via.placeholder.com/550x750' : image_crop($item->image) }}"alt="{{($item->image) }}">
                                    <img class="hover-img" src="{{ $item->image == '' ? 'https://via.placeholder.com/550x750' : asset('storage/images/thumbnails/' . $item->image) }}" alt="#">
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                            href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                Wishlist</span></a>
                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                                Compare</span></a>
                                    </div>
                                    {{-- <div class="product-action-2">
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="product_name"
                                                value="{{ $product->product_name }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <button class="add-to-cart btn btn-default" type="submit"
                                                title="Add to cart">Add to
                                                cart</button>
                                        </form>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="/products/{{ $item->slug }}">{{ $item->product_name }}</a>
                                </h3>
                                <div class="product-price">
                                    <span class="old">Rs. {{ $item->price }}</span>
                                    <span>$50.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->
