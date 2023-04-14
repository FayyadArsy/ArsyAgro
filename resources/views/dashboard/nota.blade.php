@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   
    <h1 class="text-end">{{ $tanggal }}</h1>
</div>


<div class="table-responsive">
<table class="table table-striped table-sm" style="font-size: 25px">
  <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
      <th scope="col">Tonase</th>
      <th scope="col">Harga</th>
      <th scope="col">Bayar</th>
      <th scope="col">Oleh</th>
    </tr>
  </thead>
  <tbody>
    
    {{-- NANTI KALAU UDH JADI BIKIN NAMA SEBAGAI LINK, IF TABLE HUTANG ADA LINK=AKTIF --}}
    @foreach( $transaksi as $data) 
    
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td><a href="/nota/{{ $data->id }}">{{ ucfirst($data->nama) }}</a></td>
      <td>{{ $data->tonase }}</td>
      <td>{{ $data->harga }}</td>
      <td>{{ "Rp. ".number_format($data->tonase * $data->harga, 0, ".", ".") }}</td>
      <td><a href="/admins/{{ $data->admin->username }}" class="text-decoration-none">{{ ucfirst($data->admin->name) }}</a></td>
    </tr>
  
    @endforeach
    
    
  </tbody>
</table>
</div>

{{-- coba buat paginator --}}

@if (Request::is('nota'))

  <div class="d-flex justify-content-center">
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}

             @if ($halamanaktif ==1)
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">@lang('pagination.previous')</span>
                </li>
                @else
                <li class="page-item">
                    <a class="page-link" href="{{ "nota?page=". $halamanaktif-1 }}" rel="prev">@lang('pagination.previous')</a>
                </li>
                @endif
                {{-- Next Page Link --}}
                <li class="page-item">
                  <a class="page-link" href="{{ "nota?page=" . $halamanaktif+1 }}" rel="next">@lang('pagination.next')</a>
                </li> 

        </ul>
    </nav>
  </div> 

@endif
@endsection