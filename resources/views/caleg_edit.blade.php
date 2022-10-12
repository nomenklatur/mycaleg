@extends('layout.base_layout')

@section('content')
    <div class="container mt-3 mb-5">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <form action="/user/calegs/{{$caleg->uri}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <fieldset>
              <legend>Ubah data calon legislatif</legend>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama lengkap</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $caleg->nama}}">
                @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
              <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{$caleg->tanggal_lahir}}">
                @error('tanggal_lahir')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
              <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jenis_kelamin">
                  <option value="L" @if ('L' == $caleg->jenis_kelamin) selected @endif>Laki-laki</option>
                  <option value="P" @if ('P' == $caleg->jenis_kelamin) selected @endif>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
              <div class="mb-3">
                <label for="gambar" class="form-label">Foto Calon Legislatif</label>
                <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar">
                @error('gambar')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
              <div class="mb-3">
                <label for="visi" class="form-label">Visi calon legislatif</label>
                <textarea class="form-control @error('visi') is-invalid @enderror" id="visi" name="visi" rows="3">{{ $caleg->visi}}</textarea>
                @error('visi')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
              <div class="mb-3">
                <label for="misi" class="form-label">Misi calon legislatif</label>
                <textarea class="form-control @error('misi') is-invalid @enderror" id="misi" name="misi" rows="3">{{$caleg->misi}}</textarea>
                @error('misi')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
              <div class="mb-3">
                <label for="party_id" class="form-label">Partai pengusung</label>
                <select class="form-select" name="party_id"> 
                  @foreach ($partai as $item)
                      <option value="{{ $item->id }}" @if ($item->id === $caleg->party_id) selected @endif>{{$item->nama}}</option>
                  @endforeach
                </select>
                @error('party_id')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
              <div class="mb-3">
                <label for="dapil_id" class="form-label">Daerah Pemilihan</label>
                <select class="form-select" name="dapil_id">
                  <option value="1" @if (1 == $caleg->dapil_id) selected @endif>Padang Hilir dan Tebing Tinggi Kota</option>
                  <option value="2" @if (2 == $caleg->dapil_id) selected @endif>Padang Hulu dan Bajenis</option>
                  <option value="3" @if (3 == $caleg->dapil_id) selected @endif>Rambutan</option>
                </select>
                @error('dapil_id')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
            </fieldset>
            <fieldset class="mt-3">
              <legend>Ubah parameter kriteria calon legislatif</legend>
              <div class="mb-3">
                <label for="pendidikan" class="form-label">Jenjang pendidikan</label>
                <select class="form-select" name="pendidikan">
                  <option value="1" @if (1 == $caleg->pendidikan) selected @endif>SMA atau sederajat</option>
                  <option value="2" @if (2 == $caleg->pendidikan) selected @endif>Diploma</option>
                  <option value="3" @if (3 == $caleg->pendidikan) selected @endif>Sarjana</option>
                  <option value="4" @if (4 == $caleg->pendidikan) selected @endif>Magister</option>
                  <option value="5" @if (5 == $caleg->pendidikan) selected @endif>Doktor</option>
                </select>
                @error('pendidikan')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
              <div class="mb-3">
                <label for="penghasilan" class="form-label">Penghasilan perbulan</label>
                <select class="form-select" name="penghasilan">
                  <option value="1" @if (1 == $caleg->penghasilan) selected @endif> < Rp. 3.000.000</option>
                  <option value="2" @if (2 == $caleg->penghasilan) selected @endif>Rp. 3.000.000 - Rp. 4.999.999</option>
                  <option value="3" @if (3 == $caleg->penghasilan) selected @endif>Rp. 5.000.000 - Rp. 6.999.000</option>
                  <option value="4" @if (4 == $caleg->penghasilan) selected @endif>Rp. 7.000.000 - Rp. 10.000.000</option>
                  <option value="5" @if (5 == $caleg->penghasilan) selected @endif> > Rp. 10.000.000</option>
                </select>
                @error('penghasilan')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
              <div class="mb-3">
                <label for="kekayaan" class="form-label">Nilai kekayaan</label>
                <select class="form-select" name="kekayaan">
                  <option value="1" @if (1 == $caleg->kekayaan) selected @endif> < Rp. 300 Juta</option>
                  <option value="2" @if (2 == $caleg->kekayaan) selected @endif>Rp. 300 Juta - Rp. 699 Juta</option>
                  <option value="3" @if (3 == $caleg->kekayaan) selected @endif>Rp. 700 Juta - Rp. 699 Juta</option>
                  <option value="4" @if (4 == $caleg->kekayaan) selected @endif> > Rp. 1 Milyar</option>
                </select>
                @error('kekayaan')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
              <div class="mb-3">
                <label for="keanggotaan" class="form-label">Lama di partai</label>
                <select class="form-select" name="keanggotaan">
                  <option value="1" @if (1 == $caleg->keanggotaan) selected @endif> < 3 Tahun</option>
                  <option value="2" @if (2 == $caleg->keanggotaan) selected @endif>3 Tahun - 6 Tahun</option>
                  <option value="3" @if (3 == $caleg->keanggotaan) selected @endif>7 Tahun - 9 Tahun</option>
                  <option value="4" @if (4 == $caleg->keanggotaan) selected @endif> >= 10 Tahun</option>
                </select>
                @error('keanggotaan')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
              <div class="mb-3">
                <label for="pengalaman" class="form-label">Lama di partai</label>
                <select class="form-select" name="pengalaman">
                  <option value="1" @if (1 == $caleg->pengalaman) selected @endif> < 5 Tahun</option>
                  <option value="2" @if (2 == $caleg->pengalaman) selected @endif>5 Tahun - 9 Tahun</option>
                  <option value="3" @if (3 == $caleg->pengalaman) selected @endif>10 Tahun - 14 Tahun</option>
                  <option value="4" @if (4 == $caleg->pengalaman) selected @endif> 15 Tahun - 19 Tahun</option>
                  <option value="5" @if (5 == $caleg->pengalaman) selected @endif> >= 20 Tahun</option>
                </select>
                @error('pengalaman')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                   
                @enderror
              </div>
            </fieldset>
            <div class="d-grid gap-2 mb-2">
              <button class="btn btn-success" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection