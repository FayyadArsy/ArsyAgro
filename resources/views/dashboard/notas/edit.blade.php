@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Nota</h1>
</div>
<div class="col-lg-8">

    <form method="post" action="/dashboard/notas/{{ $nota->id }}">
      @method('put')
        @csrf
        <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $nota->nama) }}">
      @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
        <div class="mb-3">
      <label for="tonase" class="form-label">Tonase</label>
      <input type="number" class="form-control @error('tonase') is-invalid @enderror" id="tonase" name="tonase" value="{{ old('tonase', $nota->tonase) }}">
      @error('tonase')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
    </div>
        <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $nota->harga) }}">
      @error('harga')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
       @enderror
    </div>
    <div class="mb-3">
      <label for="potongan" class="form-label">Potongan</label>
      <input type="number" class="form-control @error('potongan') is-invalid @enderror" id="potongan" name="potongan" value="{{ old('potongan', $nota->potongan) }}">
      @error('potongan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
       @enderror
    </div>
        <div class="mb-3">
      <label for="hutang" class="form-label">Hutang</label>
      <select class="form-select" name="pelanggan_id">
        @foreach ($pelanggans as $pelanggan)
            @if(old('pelanggan_id', $nota->pelanggan_id) == $pelanggan->id) 
            <option value="{{ $pelanggan->id }}" selected>{{ $pelanggan->nama }}</option>
            @else 
            <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
            @endif
            @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection