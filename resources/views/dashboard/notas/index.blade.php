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
    <table class="table table-striped table-sm" style="font-size: 25px">
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
         
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#notaModal{{ $data->id }}">
              Lihat Detail
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="notaModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Nota</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                    <div class="d-print-none">
                      <h3>Yth. Bpk/ibu {{ucwords(strtolower($data->nama)) }}</h3>
                      <h3> {{$data->tonase }} <span data-feather="x"></span>
                          {{$data->harga }} = <b>{{$data->tonase*$data->harga}}</b> </h3>
                      <h3>Potongan <b>{{$data->potongan }}</b></h3>
                      <h2>Total <b>{{$data->tonase*$data->harga-$data->potongan }}</b></h2>
                      @if (is_null($data->pelanggan))
                          <h2>Tidak Ada Hutang</h2>
                      @else    
                      <h2>Sisa Hutang <b>{{ $data->pelanggan->hutang }}</b></h2>
                      <h2>Nama Pemilik Hutang <b>{{ ucwords(strtolower($data->pelanggan->nama)) }}</b></h2>
                      @endif
                      
                      
                  </div>
                  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('printNota', ['id' => $data->id]) }}" class="btn btn-primary print-button" data-id="{{ $data->id }}">Print</a>
                  </div>
                </div>
              </div>
            </div>

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

    {{ $transaksi->links() }}
</div>
<script>
  document.querySelectorAll('.print-button').forEach(function(button) {
      button.addEventListener('click', function(e) {
          e.preventDefault();
          var notaId = this.getAttribute('data-id');

          // Buka jendela pop-up
          var printWindow = window.open("{{ url('dashboard/notas/') }}" + "/" + notaId, "_blank", "width=800,height=600");
          
          // Tunggu hingga halaman dimuat dan kemudian mencetak
          printWindow.onload = function() {
              printWindow.print();
          };
      });
  });
</script>



@endsection