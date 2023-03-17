@extends('dashboard.layouts.main')
@section('container')
<div class="container">
<div class="row my-3">
<div class="col lg-8">
<div class="d-print-none">

    <h1 class="mb-3">Halaman Detail Nota</h1>  
    <a href="/dashboard/notas" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
    <a href="/dashboard/notas/{{ $datapelanggan->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
    <form action="/dashboard/notas/{{ $datapelanggan->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Klik Ok Untuk Menghapus!')"><span data-feather="x-circle"></span> Delete</button>
    </form>
    <a href="" title="Print Page" onclick="window.print()" class="btn btn-info"><span data-feather="printer"></span> Print</a>
</div>

<div class="d-none d-print-block" align="center">
    <h2 class="mp0"><b>Dagang Hasil Bumi</b></h2>
    <h1 class="mp0"><b>ARNELLY</b></h1>
    <p class="mp0">KM 6 No 32. Jl. Lintas Bangko Sungai Manau</p>
    <p class="mp0"><b> 085266667054 |*| 081366935500 </b></p>
    <p class="mp0">====={{date('d-m-Y H:i', strtotime($datapelanggan->created_at)) }}=====</p>
</div>

{{-- Yang ditampilkan --}}
    <div class="d-print-none">
        <h3>Yth. Bpk/ibu {{ucwords(strtolower($datapelanggan->nama)) }}</h3>
        <h3> {{$datapelanggan->tonase }} <span data-feather="x"></span>
            {{$datapelanggan->harga }} = <b>{{$datapelanggan->tonase*$datapelanggan->harga}}</b> </h3>
        <h3>Potongan <b>{{$datapelanggan->potongan }}</b></h3>
        <h2>Total <b>{{$datapelanggan->tonase*$datapelanggan->harga-$datapelanggan->potongan }}</b></h2>
        <h2>Sisa Hutang <b>{{ $datapelanggan->pelanggan->hutang }}</b></h2>
        <h2>Nama Pemilik Hutang <b>{{ ucwords(strtolower($datapelanggan->pelanggan->nama)) }}</b></h2>
    </div>

{{-- yang di print --}}
<div class="d-none d-print-block" >
    <h4 align="center"><b>Yth. Bpk/ibu {{ucwords(strtolower($datapelanggan->nama)) }}</b></h4>
    <h6 class="mp0"> {{$datapelanggan->tonase }} <span data-feather="x"></span>
        {{$datapelanggan->harga }} 
        <span style="float:right;"><b>{{"Rp. ".number_format($datapelanggan->tonase*$datapelanggan->harga, 0, ".", ".")}}</b></span>
    </h6>
    <h6 class="mp0">Potongan   <span style="float:right;"><b>{{"Rp. ".number_format($datapelanggan->potongan, 0, ".", ".") }}</b></span></h6>
    <h6 class="mp0">Terima <span style="float:right;"><b>{{"Rp. ".number_format($datapelanggan->tonase*$datapelanggan->harga-$datapelanggan->potongan, 0, ".", ".") }}</b></span></h6>
    <h6 class="mp0">Sisa Hutang <span style="float:right;"><b>{{"Rp. ".number_format( $datapelanggan->pelanggan->hutang, 0, ".", ".") }}</b></span></h6>
    <p class="mp0"align="center">Pemilik Hutang <b>{{ ucwords(strtolower($datapelanggan->pelanggan->nama)) }}</b></p>
    <p class="mp0"align="center">======|| NoNota {{$datapelanggan->id }} ||======</p>
</div>
</div>
</div>
</div>

@endsection