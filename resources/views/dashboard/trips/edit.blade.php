@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Ubah Data Mobil {{ $mobil }}</h1>
</div>


<div class=" text-center">
  <div class="row row-cols-2 row-cols-lg-3  ">
    <div class="col-sm-6 col-md-8">

          <div class="container text-center">
            <div class="row p-2">
              <div class="col-2 p-3">
                <label for="mobil" class="form-label">Mobil</label>
              </div>
              <div class="col-10 p-2">
                <form method="post" action="/dashboard/trips/{{ $trip->id }}">
                  @method('put')
                    @csrf
                    <div class="mb-3">
                 
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
                <div class="d-flex flex-row-reverse">
                      
                </div>
            </form>
              </div>
            
            </div>
          </div>

    </div>
    <div class="d-flex p-2">
      <div class="pt-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>

  </div>
</div>



<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Nota Pabrik {{ $mobil }}</h1>
</div>
@endsection