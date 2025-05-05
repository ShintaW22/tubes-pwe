@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <center><h1>TAMBAH DATA PRABOTAN</h1></center>
        <form action="/prabotan" method="post">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Prabotan</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">SIMPAN DATA</button>
        </form>
    </div>
</div>
@endsection
