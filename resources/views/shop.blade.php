@extends('master-layout')

@section('menu')
    @include('includes/menu')
@endsection

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active">{{ $categoryName }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Product Style -->
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                @include('includes/sidebar')

                <div class="col-lg-9 col-md-8 col-12">
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2>{{ $categoryName }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="/products/{{ $product->slug }}">
                                                            <img class="default-img"
                                                                src="{{ $product->image == '' ? 'https://via.placeholder.com/550x750' : image_crop($product->image) }}"
                                                                alt="#">
                                                            <img class="hover-img"
                                                                src="{{ $product->image == '' ? 'https://via.placeholder.com/550x750' : asset('storage/images/thumbnails/' . $product->image) }}"
                                                                alt="#">
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
                                            <div class="product-action-2">
                                                @include('includes/add-to-cart')
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="/products/{{ $product->slug }}">{{ $product->product_name }}</a>
                                        </h3>
                                        <div class="product-price">
                                            <span>Rs. {{ $product->price }}</span><br>
                                            {{-- <span><a
                                                    href="/categories/{{ $product->category->id }}">{{ $product->category->name }}</a></span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Product Style 1  -->
@endsection
