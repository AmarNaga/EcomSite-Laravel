<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">

                <h2>Create Product</h2>
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    Product Name: <input type="text" name="product_name" id="" class="form-control"
                        value="{{ old('product_name') }}" @error('product_name') style="border-color: red;" @enderror>
                    @error('product_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br><br>

                    Product Slug: <input type="text" name="slug" id="" class="form-control"
                        value="{{ old('slug') }}" @error('slug') style="border-color: red;" @enderror>
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br><br>

                    Product Detail: <input type="text" name="details" id="" class="form-control"
                        value="{{ old('details') }}" @error('details') style="border-color: red;" @enderror>
                    @error('details')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br><br>

                    Price: <input type="text" name="price" id="" class="form-control" value="{{ old('price') }}"
                    @error('price') style="border-color: red;" is-invalid @enderror>
                    @error('price')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br><br>

                    Product Desc: <textarea name="product_desc" id="" cols="30" rows="10" class="form-control"
                        @error('product_desc') style="border-color: red;" is-invalid
                        @enderror>{{ old('product_desc') }}</textarea>
                    @error('product_desc')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <br><br>
                    
                    Category:
                    <x-forms.select name="category_id" class="form-control">
                        <option value="0">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </x-forms.select>
                    @error('category_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    <br><br>
                    <input type="file" name="image_upload" id="">
                    {{-- <select name="category_id" id="">
                        <option value="0">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select> --}}
                    <input type="submit" name="submit" value="Save" class="form-control">
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>
