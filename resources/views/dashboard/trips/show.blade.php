@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Muatan Mobil</h1>
</div>
<div class="table-responsive">
  
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
            @method('patch')
            @csrf
            <input type="hidden" name="trip" value="0">  
            <button class="badge bg-danger border-0" onclick="return confirm('Klik Ok Untuk Menghapus!')"><span data-feather="x-circle"></span></button>
            </form>
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>

@endsection