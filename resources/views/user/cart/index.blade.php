@extends('layouts.user')

@section('title', 'Your Cart')

@section('content')
    <h1>Your Cart</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->product->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->product->price * $item->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('user.order') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select name="payment_method" class="form-control" required>
                <option value="credit_card">Credit Card</option>
                <option value="bank_transfer">Bank Transfer</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Proceed to Checkout</button>
    </form>
@endsection
