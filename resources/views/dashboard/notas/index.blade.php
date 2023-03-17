@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Nota</h1>
</div>
@if (session()->has('success'))
    <div class="alert alert-primary col-lg-3" role="alert">
      {{ session('success') }}
    </div>
@endif
<div class="table-responsive">
  <a href="/dashboard/notas/create" class="btn btn-primary mb-3">Buat Nota</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Tonase</th>
          <th scope="col">Harga</th>
          <th scope="col">Potongan</th>
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
          <td>{{"Rp. ".number_format( $data->potongan , 0, ".", ".")}}</td>
          <td>
            <a href="/dashboard/notas/{{ $data->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/notas/{{ $data->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/notas/{{ $data->id }}" method="post" class="d-inline">
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