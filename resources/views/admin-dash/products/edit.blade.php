<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <h2>Update Product: {{ $product->product_name }}</h2>

                <form action="{{ route('products.update', $product->id) }}" method="POST">

                    @method('PUT')
                    @csrf
                    Product Name: <input type="text" name="product_name" id="" class="form-control"
                        value="{{ $product->product_name }}" @error('product_name') style="border-color: red;"
                        is-invalid @enderror>
                    @error('product_name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    <br><br>
                    Product Desc: <textarea name="product_desc" id="" cols="30" rows="10" class="form-control"
                        @error('product_desc') style="border-color: red;" is-invalid
                        @enderror>{{ $product->product_desc }}</textarea>
                    @error('product_desc')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    <br><br>
                    Price: <input type="text" name="price" id="" value="{{ $product->price }}" class="form-control"
                        @error('price') style="border-color: red;" is-invalid @enderror>
                    @error('price')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    <br><br>
                    Category:
                    <x-forms.select name="category_id" class="form-control">
                        <option value="0">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </x-forms.select>
                    @error('category_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    <br><br>
                    {{-- <select name="category_id" id="">
                        <option value="0">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select> --}}
                    <input type="submit" name="submit" value="Update Product" class="form-control">
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>
