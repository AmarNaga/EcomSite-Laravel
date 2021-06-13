<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">

                <h2>Create Category</h2>
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    Category Name: <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name') }}" @error('name') style="border-color: red;" @enderror>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br><br>
                    Category Slug: <input type="text" name="slug" id="slug" class="form-control"
                        value="{{ old('name') }}" @error('slug') style="border-color: red;" is-invalid @enderror>
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br><br>
                    Category Desc: <textarea name="description" id="" cols="30" rows="10"
                        class="form-control">{{ old('description') }} @error('description') style="border-color: red;" is-invalid @enderror</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br><br>
                    Parent Category:
                    <x-forms.select name="parent_id" class="form-control">
                        <option value="0">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('parent_id') ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </x-forms.select>
                    @error('parent_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                    <br><br>

                    <input type="submit" name="submit" value="Save" class="form-control">
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>
<script>
    jQuery(document).ready(function($) {
        $('#name').on('change', function() {
            var name = $('#name').val();
            var slug = name.replace(/\s+/g, '-').toLowerCase();
            $('#slug').val(slug);
        })
    })

</script>
