@extends('layouts.main')
@section('container')



 <h1>Halaman Hutang</h1>   
 <h2>Nama : {{$datapelanggan->nama }}</h2>
 <h2>Tonase : {{$datapelanggan->tonase}}</h2>
 <h2>Harga : {{$datapelanggan->harga}}</h2>
 <h2>Bayar : {{$datapelanggan->tonase * $datapelanggan->harga}}</h2>
 <h2>Total Hutang : {{ $datapelanggan->pelanggan->hutang }}</h2>
 <h2>Nama Pemilik hutang : {{ $datapelanggan->pelanggan->nama }}</h2>
   

    <a href="/nota">Kembali</a>
    @endsection
