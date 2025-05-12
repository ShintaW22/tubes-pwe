@extends('layouts.admin')

@section('content')
    <h2 class="mb-4">👑 Selamat Datang Admin!</h2>
    <p>Ini adalah halaman dashboard khusus admin.</p>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">👥 Jumlah User</h5>
                    <p class="card-text fs-4">{{ \App\Models\User::count() }} user</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">📦 Jumlah Produk</h5>
                    <p class="card-text fs-4">{{ \App\Models\Product::count() }} item</p>
                </div>
            </div>
        </div>
    </div>
@endsection
