@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Nota</h1>
</div>
<div class="col-lg-8">

    <form method="post" action="/dashboard/notas">
        @csrf
        <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
      @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
        <div class="mb-3">
      <label for="tonase" class="form-label">Tonase</label>
      <input type="number" class="form-control @error('tonase') is-invalid @enderror" id="tonase" name="tonase" value="{{ old('tonase') }}">
      @error('tonase')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
    </div>
        <div class="mb-3">
      <label for="harga" class="form-label">Harga</label>
      <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
      @error('harga')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
    </div>
        <div class="mb-3">
      <label for="potongan" class="form-label">Potongan</label>
      <input type="number" class="form-control @error('potongan') is-invalid @enderror" id="potongan" name="potongan" onfocus="this.value=''" value="{{ old('potongan',0) }}">
      @error('potongan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
    </div>
        <div class="mb-3">
      <label for="hutang" class="form-label">Hutang</label>
      {{-- <select class="form-control selectpicker" id="select-country" data-live-search="true">
        @foreach ($pelanggans as $pelanggan)
            @if (old('pelanggan_id') == $pelanggan->id) 
            <option value="{{ $pelanggan->id }}" selected>{{ $pelanggan->nama }}</option>
            @else 
            <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
            @endif
            @endforeach
        </select> --}}
    
          <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
          <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="     crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
      <select class="" name="pelanggan_id" id="pelanggan">
        @foreach ($pelanggans as $pelanggan)
       
            @if (old('pelanggan_id') == $pelanggan->id) 
            <option  value="{{ $pelanggan->id }}" selected>{{ $pelanggan->nama }}</option>
            @else 
            <option  value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
            @endif
            @endforeach
           
      </select>
      
      <script type="text/javascript">
        $(document).ready(function() {
            $('#pelanggan').select2();
        });
       </script>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    
</form>

</div>

@endsection
