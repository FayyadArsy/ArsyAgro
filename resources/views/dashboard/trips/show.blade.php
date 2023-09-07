@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Muatan Mobil</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-primary col-lg-3" role="alert">
      {{ session('success') }}
    </div>
@endif
<a href="/dashboard/trips/{{ $idHalaman }}/edit" class="btn btn-primary mb-3">Edit Trip</a>
<div class="table-responsive">
  
    <table class="table table-striped table-responsive-sm" style="font-size: 25px">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Tonase</th>
          <th scope="col">Harga</th>
          <th scope="col">Bayar</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      
      <tbody>
        
        @foreach ($transaksi as $data)
     
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data->nama }}</td>
          <td>{{ $data->tonase }}</td>
          <td>{{ $data->harga }}</td>
          <td>{{"Rp. ".number_format( $data->tonase * $data->harga , 0, ".", ".")}}</td>
          <td>
            <a href="/dashboard/notas/{{ $data->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/notas/{{ $data->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/notas/{{ $data->id }}" method="post" class="d-inline">
            @method('patch')
            @csrf
            <input type="hidden" name="trip" value="0"> 
            <input type="hidden" name="id" value= {{ $datas->id }}>  
            <button class="badge bg-danger border-0" onclick="return confirm('Klik Ok Untuk Menghapus!')"><span data-feather="x-circle"></span></button>
            </form>
            
          </td>
        </tr>
      
        @endforeach
      
        
      </tbody>
      <tfoot>
        <tr>
            <th colspan="2">Total:</th>
            <th>{{ $totalTonase }}</th>
            <th>#</th>
            <th>{{"Rp. ".number_format($totalBayar, 0, ".", ".")}}</th>
            <th></th>
        </tr>
    </tfoot>
    </table>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Hasil Akhir</h1>
</div>

<table class="table table-striped table-responsive-sm" style="font-size: 25px">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Harga</th>
      <th scope="col">Tonase</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row">Pabrik</td>
      <td>{{ $datas->hargaPabrik }}</td>
      <td>{{ $datas->tonasePabrik }}</td>
      <td>{{ "Rp. ".number_format($datas->hargaPabrik * $datas->tonasePabrik, 0, ".", ".") }}</td>
    </tr>
    <tr>
      <td scope="row" >Gaji</td>
      <td>45</td>
      <td>{{ $datas->tonasePabrik }}</td>
      <td>{{"Rp. ".number_format($gaji = 45 * $datas->tonasePabrik, 0, ".", ".") }}</td>
    </tr>
    <tr>
      <td scope="row">Amprah</td>
      <td>100</td>
      <td>{{ $datas->tonasePabrik }}</td>
      <td>{{"Rp. ".number_format($amprah = 200 * $datas->tonasePabrik, 0, ".", ".") }}</td>
    </tr>
    <tr>
      <td colspan="3">Total:</td>
      <td>{{ "Rp. ".number_format($total = ($datas->hargaPabrik * $datas->tonasePabrik) - $gaji -$amprah, 0, ".", ".")  }}</td> 
    </tr>
  <tr>
        <td colspan="3">Total Beli:</td>    
        <td> {{"Rp. ".number_format($totalBayar, 0, ".", ".")}}</td>   
  </tr>
  </tbody>
  <tfoot>
    <tr>
        <th colspan="3">Total Bersih:</th>
       
        <th> {{"Rp. ".number_format($total - $totalBayar, 0, ".", ".")}}</th>
       
    </tr>
</tfoot>
</table>
@endsection