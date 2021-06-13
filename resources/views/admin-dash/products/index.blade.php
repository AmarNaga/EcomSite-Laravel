<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="row pb-3">
                    <div class="col-md-6">
                        <h2 class="text-center"><strong> List of Products</strong></h2>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('products.create') }}">
                            <p class="text-right text-uppercase fs-3"><strong> Create Product?</strong></p>
                        </a>
                    </div>
                </div>
                <table class="table table-striped" width="900" align="center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($products as $product)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ substr($product->product_desc, 0, 50) }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}">Edit </a>|<a href="#">
                                        Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-admin.layout>
