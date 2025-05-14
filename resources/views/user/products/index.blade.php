@extends('layouts.user')

@section('title', 'Products')

@section('content')
    <h1>Available Products</h1>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ $product->getImageUrl() }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('user.products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
