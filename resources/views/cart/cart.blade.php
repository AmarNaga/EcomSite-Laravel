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
                            <li><a href="{{ 'home' }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active">Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div>
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Cart::content()->count() > 0)

                    <h2 class="alert alert-success"> {{ Cart::content()->count() }} item(s) in shopping cart.</h2>

                    <div class="row">
                        <div class="col-12">
                            <!-- Shopping Summery -->
                            <table class="table shopping-summery">
                                <thead>
                                    <tr class="main-hading">
                                        <th>PRODUCT</th>
                                        <th>NAME</th>
                                        <th class="text-center">UNIT PRICE</th>
                                        <th class="text-center">QUANTITY</th>
                                        <th class="text-center">TOTAL</th>
                                        <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $product)
                                        <tr>
                                            <td class="image" data-title="No">
                                                <img class="img-thumbnail"
                                                                src="{{ $product->model->image == '' ? 'https://via.placeholder.com/550x750' : image_crop($product->model->image) }}"
                                                                alt="{{($product->model->image) }}">
                                            </td>
                                            <td class="product-des" data-title="Description">
                                                <p class="product-name"><a
                                                        href="/products/{{ $product->model->slug }}">{{ $product->model->product_name }}</a>
                                                </p>
                                                <p class="product-des">{{ $product->model->details }}
                                                </p>
                                            </td>
                                            <td class="price" data-title="Price"><span>{{ $product->model->price }}
                                                </span></td>
                                            <td class="qty" data-title="Qty">
                                                <!-- Input Order -->
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            disabled="disabled" data-type="minus" data-field="quant[1]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                        data-max="100" value="1">
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            data-type="plus" data-field="quant[1]">
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--/ End Input Order -->
                                            </td>
                                            <td class="total-amount" data-title="Total"><span>$220.88</span></td>
                                            <td class="action" data-title="Remove">
                                                <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="ti-trash remove-icon"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--/ End Shopping Summery -->
                        </div>
                    </div>

                @else
                    <h3 class="alert alert-danger">No items in the cart.</h3>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('shop') }}"><button type="submit" class="btn btn-primary">
                                Continue Shopping</button></a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <button class="btn">Apply</button>
                                        </form>
                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">
                                            Shipping (+10$)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>Rs. {{ Cart::subtotal() }}</span></li>
                                        <li>Tax(13%)<span>Rs. {{ Cart::tax() }}</span></li>
                                        <li>Shipping<span>Free</span></li>
                                        <li class="last">You Pay<span>{{ Cart::total() }}</span></li>
                                    </ul>
                                    <div class="button5">
                                        <a href="#" class="btn">Checkout</a>
                                        <a href="{{ route('shop') }}"><button type="submit" class="btn btn-primary">
                                                Continue Shopping</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>




        </div>
    </div>
    <!--/ End Shopping Cart -->
    @include('includes/most-popular')

@endsection
