@extends('layout.base_layout')

@section('content')
    <div class="container mt-3">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <form action="/user/calegs" method="post">
            @csrf
            <fieldset>
              <legend>Input data calon legislatif</legend>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama">
              </div>
              <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
              </div>
              <div class="mb-3">
                <label for="visi" class="form-label">Visi calon legislatif</label>
                <textarea class="form-control" id="visi" name="visi" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="misi" class="form-label">Misi calon legislatif</label>
                <textarea class="form-control" id="misi" name="misi" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="party_id" class="form-label">Partai pengusung</label>
                <select class="form-select" name="party_id">
                  @foreach ($partai as $item)
                      <option value="{{ $item->id }}">{{$item->nama}}</option>
                  @endforeach
                </select>
              </div>
            </fieldset>
            <fieldset>
              <legend>Input parameter kriteria calon legislatif</legend>
              <div class="mb-3">
                <label for="pendidikan" class="form-label">Jenjang pendidikan</label>
                <select class="form-select" name="pendidikan">
                  <option value="1">SMA atau sederajat</option>
                  <option value="2">Diploma</option>
                  <option value="3">Sarjana</option>
                  <option value="4">Magister</option>
                  <option value="5">Doktor</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="penghasilan" class="form-label">Penghasilan perbulan</label>
                <select class="form-select" name="penghasilan">
                  <option value="1"> < Rp. 3.000.000</option>
                  <option value="2">Rp. 3.000.000 - Rp. 4.999.999</option>
                  <option value="3">Rp. 5.000.000 - Rp. 6.999.000</option>
                  <option value="4">Rp. 7.000.000 - Rp. 10.000.000</option>
                  <option value="5"> > Rp. 10.000.000</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="kekayaan" class="form-label">Nilai kekayaan</label>
                <select class="form-select" name="kekayaan">
                  <option value="1"> < Rp. 300 Juta</option>
                  <option value="2">Rp. 300 Juta - Rp. 699 Juta</option>
                  <option value="3">Rp. 700 Juta - Rp. 699 Juta</option>
                  <option value="4"> > Rp. 1 Milyar</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="keanggotaan" class="form-label">Lama di partai</label>
                <select class="form-select" name="keanggotaan">
                  <option value="1"> < 3 Tahun</option>
                  <option value="2">3 Tahun - 6 Tahun</option>
                  <option value="3">7 Tahun - 9 Tahun</option>
                  <option value="4"> >= 10 Tahun</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="pengalaman" class="form-label">Lama di partai</label>
                <select class="form-select" name="pengalaman">
                  <option value="1"> < 5 Tahun</option>
                  <option value="2">5 Tahun - 9 Tahun</option>
                  <option value="3">10 Tahun - 14 Tahun</option>
                  <option value="4"> 15 Tahun - 19 Tahun</option>
                  <option value="5"> >= 20 Tahun</option>
                </select>
              </div>
            </fieldset>
            <div class="d-grid gap-2">
              <button class="btn btn-success" type="Submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection