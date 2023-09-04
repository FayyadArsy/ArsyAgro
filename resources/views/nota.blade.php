@extends('layouts.main')
@section('container')



<div class="container mt-5">
   <h1 class="text-center mb-4">Halaman Hutang</h1>
   <div class="row justify-content-center">
       <div class="col-md-6">
           <div class="card">
               <div class="card-body">
                   <div class="mb-3">
                       <strong>Nama:</strong>
                       <span>{{$datapelanggan->nama}}</span>
                   </div>
                   <div class="mb-3">
                       <strong>Tonase:</strong>
                       <span>{{$datapelanggan->tonase}}</span>
                   </div>
                   <div class="mb-3">
                       <strong>Harga:</strong>
                       <span>{{$datapelanggan->harga}}</span>
                   </div>
                   <div class="mb-3">
                       <strong>Bayar:</strong>
                       <span>{{$datapelanggan->tonase * $datapelanggan->harga}}</span>
                   </div>
                   <div class="mb-3">
                       <strong>Total Hutang:</strong>
                       <span>{{$datapelanggan->pelanggan->hutang}}</span>
                   </div>
                   <div class="mb-3">
                       <strong>Nama Pemilik Hutang:</strong>
                       <span>{{$datapelanggan->pelanggan->nama}}</span>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>

  
  

  
  

    <a href="/nota">Kembali</a>
    @endsection