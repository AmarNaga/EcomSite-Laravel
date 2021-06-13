<form action="{{ route('cart.store') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <input type="hidden" name="product_name" value="{{ $product->product_name }}">
    <input type="hidden" name="price" value="{{ $product->price }}">
    <button class="add-to-cart btn btn-default" type="submit" title="Add to cart">Add to
        cart</button>
</form>
