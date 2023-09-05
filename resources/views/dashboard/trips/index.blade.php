@extends('dashboard.layouts.main')

@php
use App\Models\Transaksi;
@endphp

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Trip</h1>
</div>
@if (session()->has('success'))
    <div class="alert alert-primary col-lg-3" role="alert">
      {{ session('success') }}
    </div>
@endif
<div class="table-responsive">
  <a href="/dashboard/trips/create" class="btn btn-primary mb-3">Buat Nota</a>
    
    <table class="table table-striped table-sm" style="font-size: 25px">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Mobil</th>
          <th scope="col">Tonase</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
       
        @foreach ($transaksi as $transaksiItem)
       
        <tr>
          <td>{{ $loop->iteration }}</td>

          @if ($transaksiItem->mobil==1)
          <td>Canter</td>
          @elseif ($transaksiItem->mobil==2)
          <td>Dina</td>
          @else
          <td class="text-danger">Belum Diatur</td>
          @endif
          <td class="{{ $totalTonase[$transaksiItem->id] < 10000 ? '' : 'text-success' }}" >
            {{ $totalTonase[$transaksiItem->id] }}
          </td>
         
         
          <td>{{ $transaksiItem->created_at->timezone('Asia/Jakarta') }}</td>
          <td>
            <a href="/dashboard/trips/{{ $transaksiItem->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/trips/{{ $transaksiItem->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/trips/{{ $transaksiItem->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Klik Ok Untuk Menghapus!')"><span data-feather="x-circle"></span></button>
            </form>
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>

@endsection