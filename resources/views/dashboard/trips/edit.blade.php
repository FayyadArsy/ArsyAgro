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
      <button class="btn btn-outline-secondary  btn-secondary text-light " type="submit" id="button-addon2">Kirim</button>
    </div>
    
  </div>
  
</div>
</form>

@endsection