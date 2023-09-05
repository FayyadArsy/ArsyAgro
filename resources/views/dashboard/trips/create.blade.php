@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome, {{ ucfirst(auth()->user()->name) }}</h1> 
</div>
<form method="post" action="/dashboard/trips">
  @csrf
<div class="row ">
  <div class="col">

 
  <select class="form-select" aria-label="Default select example" name="mobil">
    
    <option value="0">Select Option</option>
    <option value="1">Canter</option>
    <option value="2">Dina</option>

  </select>
</div>
<div class="col d-flex flex-row-reverse">
  <button type="submit" class="btn btn-primary">Submit</button> 
</div>
</div>
  <div class="table-responsive">
    <table class="table table-striped table-sm" style="font-size: 25px">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Tonase</th>
          <th scope="col">Tambah</th>
        </tr>
      </thead>
      <tbody>
        
        
        {{-- NANTI KALAU UDH JADI BIKIN NAMA SEBAGAI LINK, IF TABLE HUTANG ADA LINK=AKTIF --}}
        @foreach( $transaksi as $data) 
        {{-- <input type="hidden" class="form-control" id="id" name="id[]" value="{{ $data->id }}"> --}}
    
    <tr class="clickable-row">
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ ucfirst($data->nama) }}</td>
      <td>{{ $data->tonase }}</td>
      <td><div class="form-check">
            <input class="form-check-input" type="checkbox" name="truk[]" value="{{ $data->id }}" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">Truk</label>
          </div>
     </td>

    </tr>
  
    @endforeach
    
    
  </tbody>
</table>
</div>
</form>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const rows = document.querySelectorAll('.clickable-row');

    rows.forEach(row => {
      row.addEventListener('click', (event) => {
        // Check if the click occurred on the checkbox or its label
        if (event.target.type !== 'checkbox') {
          const checkbox = row.querySelector('input[type="checkbox"]');
          checkbox.checked = !checkbox.checked;
        }
      });
    });
  });
</script>

@endsection