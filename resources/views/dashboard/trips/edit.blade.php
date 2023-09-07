@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Ubah Data Mobil {{ $mobil }}</h1>
</div>
<form method="post" action="/dashboard/trips/{{ $trip->id }}">
  @method('put')
    @csrf
    <div class="col-sm-6 col-md-4">
          <select class="form-select" aria-label="Default select example" name="mobil">
            <option value="0" @if ($trip->mobil == 0) selected @endif>Belum Diatur</option>
            <option value="1" @if ($trip->mobil == 1) selected @endif>Canter</option>
            <option value="2" @if ($trip->mobil == 2) selected @endif>Dina</option>
        </select>
          @error('mobil')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
    </div>
    {{-- <div class="d-flex p-2">
      <div class="pt-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div> --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Nota Pabrik {{ $mobil }}</h1>
</div>
<div class="row">
  <div class="col-md-7">
    <div class="input-group mb-3">
      <input type="number" class="form-control" placeholder="Tonase Pabrik" name="tonasePabrik">
      <input type="number" class="form-control" placeholder="Harga Pabrik" name="hargaPabrik" aria-describedby="button-addon2">
      <button class="btn btn-outline-secondary  btn-secondary text-light " type="submit" id="button-addon2" name="action" value="notaPabrik">Kirim</button>
    </div>
    
  </div>
  
</div>
</form>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Muatan</h1>
</div>

<form action="/dashboard/trips/{{ $trip->id }}" method="post">
  @method('put')
  @csrf
  <div class="d-flex flex-row-reverse">
    <button type="submit" value="muatan"  name="action" class="btn btn-secondary">Submit</button>
  </div>
  
<div class="table-responsive">
  <table class="table table-striped table-sm" style="font-size:25px">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Tonase</th>
        <th scope="col">Tambah</th>
      </tr>
    </thead>
    <tbody>
      @foreach ( $transaksis as $transaksi)
        <tr class="clickable-row">
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ ucfirst($transaksi->nama) }}</td>
          <td>{{ ucfirst($transaksi->tonase) }}</td>
          <td>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="truk[]" value="{{ $transaksi->id }}" id="flexCheckDefault">
              <label for="flexCheckDefault" class="form-check-label">Truk</label>
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