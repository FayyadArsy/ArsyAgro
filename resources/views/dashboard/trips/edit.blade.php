@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ubah Mobil</h1>
</div>

<div class="col-lg-8">

    <form method="post" action="/dashboard/trips/{{ $trip->id }}">
      @method('put')
        @csrf
        <div class="mb-3">
      <label for="mobil" class="form-label">Mobil</label>
      <select class="form-select" aria-label="Default select example" name="mobil">
    
        <option value="0">Select Option</option>
        <option value="1">Canter</option>
        <option value="2">Dina</option>
    
      </select>
      @error('mobil')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection