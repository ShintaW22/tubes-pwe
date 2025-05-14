@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
    <h1>Edit Product</h1>

    <!-- Form untuk mengedit produk -->
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nama Produk -->
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        <!-- Deskripsi Produk -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Harga Produk -->
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <!-- Stok Produk -->
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
        </div>

        <!-- Gambar Produk (Optional) -->
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($product->image)
                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Product</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
