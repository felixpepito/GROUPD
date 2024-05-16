@extends('layouts.main')

@section('extra')

<div class="container">
    <h1 class="my-4">Edit Product</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="Product_NAME" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" id="Product_NAME" name="Product_NAME" value="{{ old('Product_NAME', $product->Product_NAME) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Product_PRICE" class="form-label">Product Price:</label>
                    <input type="text" class="form-control" id="Product_PRICE" name="Product_PRICE" value="{{ old('Product_PRICE', $product->Product_PRICE) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Image_Name" class="form-label">Product Image:</label>
                    <input type="file" class="form-control" id="Image_Name" name="Image_Name">
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</div>

@endsection
