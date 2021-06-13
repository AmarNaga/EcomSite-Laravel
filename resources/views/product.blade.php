@extends('master-layout')

@section('menu')
    @include('includes/menu')
@endsection

@section('main-content')
    @include('includes/breadcrumb')

    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                                
                            <img class="default-img" src="{{ $product->image == '' ? 'https://via.placeholder.com/550x750' : image_crop($product->image) }}" alt="{{($product->image) }}">
                                                            
                            </div>

                        </div>


                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{ $product->product_name }}</h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div>
                        <p class="product-description">{!! $product->product_desc !!}</p>
                        <h4 class="price">current price: <span>Rs. {{ $product->price }}</span></h4>
                        <h5 class="price">Details: <span>{{ $product->details }}</span></h5>
                        <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                        <h5 class="sizes">sizes:
                            <span class="size" data-toggle="tooltip" title="small">s</span>
                            <span class="size" data-toggle="tooltip" title="medium">m</span>
                            <span class="size" data-toggle="tooltip" title="large">l</span>
                            <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                        </h5>
                        <h5 class="colors">colors:
                            <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                            <span class="color green"></span>
                            <span class="color blue"></span>
                        </h5><br>
                        <div class="row">
                            @include('includes/add-to-cart')
                            <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- related products --}}

    @include('includes/most-popular')

@endsection
