@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Hutang</h1>
</div>

<div class="col-lg-8">

    <form method="post" action="/dashboard/hutang/{{ $pelanggan->id }}">
      @method('put')
        @csrf
        <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $pelanggan->nama) }}">
      @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
        <div class="mb-3">
      <label for="nohp" class="form-label">No HP</label>
      <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="nohp" name="nohp" value="{{ old('nohp', $pelanggan->nohp) }}">
      @error('nohp')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
    </div>
        <div class="mb-3">
      <label for="hutang" class="form-label">Hutang</label>
      <input type="number" class="form-control @error('hutang') is-invalid @enderror" id="hutang" name="hutang" value="{{ old('hutang', $pelanggan->hutang) }}">
      @error('hutang')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
       @enderror
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $pelanggan->alamat) }}">
      @error('alamat')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
       @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection