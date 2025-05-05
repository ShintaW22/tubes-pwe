@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <center><h1>UBAH DATA PRABOTAN</h1></center>

        <form action="{{ route('prabotan.update', $prabotan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">NAMA</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $prabotan->name) }}">
            </div>

            <div class="mb-3">
                <label for="deskripsi">DESKRIPSI</label>
                <input class="form-control" type="text" name="deskripsi" id="deskripsi" value="{{ old('deskripsi', $prabotan->deskripsi) }}">
            </div>

            <div class="mb-3">
                <label for="stok">STOK</label>
                <input class="form-control" type="number" name="stok" id="stok" value="{{ old('stok', $prabotan->stok) }}">
            </div>

            <div class="mb-3">
                <label for="harga">HARGA</label>
                <input class="form-control" type="number" step="0.01" name="harga" id="harga" value="{{ old('harga', $prabotan->harga) }}">
            </div>

            <button class="btn btn-primary" type="submit">UBAH DATA</button>
        </form>
    </div>
</div>
@endsection
