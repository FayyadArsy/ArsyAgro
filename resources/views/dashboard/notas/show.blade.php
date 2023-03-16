@extends('dashboard.layouts.main')
@section('container')
<div class="container">
<div class="row my-3">
<div class="col lg-8">

    <h1 class="mb-3">Halaman detil</h1>  
    <a href="/dashboard/notas" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
    <a href="/dashboard/notas/{{ $datapelanggan->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
    <form action="/dashboard/notas/{{ $datapelanggan->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Klik Ok Untuk Menghapus!')"><span data-feather="x-circle"></span> Delete</button>
        </form>
    
    <h2>{{$datapelanggan->nama }}
        {{$datapelanggan->tonase }}
        {{$datapelanggan->harga }}
     potongan   {{$datapelanggan->potongan }}</h2>
        <h2>Total hutang {{ $datapelanggan->pelanggan->hutang }}</h2>
        <h2>Nama Pemilik hutang {{ $datapelanggan->pelanggan->nama }}</h2>
</div>
</div>
</div>

@endsection