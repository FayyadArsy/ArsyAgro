@extends('layouts.main')
@section('container')  
 <table class="table" style="font-size: 25px">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Hutang</th>
        <th scope="col">NoHP</th>
        <th scope="col">Alamat</th>
    </tr>
    </thead>
    <tbody>
     
    
 
    {{-- NANTI KALAU UDH JADI BIKIN NAMA SEBAGAI LINK, IF TABLE HUTANG ADA LINK=AKTIF --}}
    @foreach( $pelanggan as $data) 

    
    <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td><a href="/pelanggan/{{ $data->nama }}">{{ $data->nama }}</td>
        <td>{{ $data->hutang }}</a></td>
        <td>{{ $data->nohp }}</a></td>
        <td>{{ $data->alamat }}</a></td>
        {{-- <td>{{ $data->harga }}</td>
        <td>{{ $data->bayar }}</td> --}}
      </tr>
   


      @endforeach

    </tbody>
  </table>
  
@endsection
