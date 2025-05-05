@extends('layouts.app')

@section('content')
<center><h1 class="mb-5">TOKO FANTA</h1></center>
@if (session()->has('success'))
<div class="alert alert-success">
  {{(session('success'))}}
</div>
@endif
<a href="/prabotan/create" class="btn btn-primary mb-2">+Tambah Data</a>
<table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Prabotan</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Stok</th>
        <th scope="col">Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    @foreach ($prabotans as $prabotan)
      <tbody>
        <tr>
          <th scope="row">{{$loop->iteration}}</th>
          <td>{{$prabotan->name}}</td>
          <td>{{$prabotan->deskripsi}}</td>
          <td>{{$prabotan->stok}}</td>
          <td>{{$prabotan->harga}}</td>
          <td>
            <a href="/prabotan/{{$prabotan->id}}/edit" class="btn btn-warning">Edit</a>
            <form action="/prabotan/{{$prabotan->id}}" method="post" class="d-inline">
              @method('delete')
              <a href="{{ route('prabotan.show', $prabotan->id) }}" class="btn btn-info">Lihat</a>
              @csrf
              <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Data?')">Hapus</button>
            </form>
          </td>
        </tr>
      </tbody>
    @endforeach
  </table>
@endsection
