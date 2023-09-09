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
      <input type="number" class="form-control @error('potongan') is-invalid @enderror"
       id="potongan" name="potongan" onfocus="if(this.value=='0')this.value=''" onblur="if(this.value=='')this.value='0'" value="{{ old('potongan',0) }}">
      @error('potongan')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
    </div>

      <div class="mb-3">

        <select class="form-select wrapper "  name="pelanggan_id" id="pelanggan" onfocus='this.size=11;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
          <option value="0">Select Option</option>
        <div class="">
          @foreach ($pelanggans as $pelanggan)
            <option  value="{{ $pelanggan->id }}">{{ $pelanggan->nama }} </option>
          @endforeach
        </div>
      </select>
      
      
      
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    
</form>

</div>



@endsection
