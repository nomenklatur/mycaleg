@extends('layout.base_layout')

@section('content')
    <div class="container mt-3">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <form action="/user/calegs" method="post">
            <fieldset>
              <legend>Input data calon legislatif</legend>
              <div class="mb-3">
                <label for="input_nama" class="form-label">Nama lengkap</label>
                <input type="text" class="form-control" id="input_nama" name="input_nama">
              </div>
              <div class="mb-3">
                <label for="input_ttl" class="form-label">Tanggal lahir</label>
                <input type="text" class="form-control" id="input_nama" name="input_nama">
              </div>
              <div class="mb-3">
                <label for="input_visi" class="form-label">Visi calon legislatif</label>
                <textarea class="form-control" id="input_visi" name="input_visi" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="input_misi" class="form-label">Misi calon legislatif</label>
                <textarea class="form-control" id="input_misi" name="input_misi" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Pilih partai pengusung</option>
                  @foreach ($partai as $item)
                      <option value="{{ $item->id }}">{{$item->nama}}</option>
                  @endforeach
                </select>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
@endsection