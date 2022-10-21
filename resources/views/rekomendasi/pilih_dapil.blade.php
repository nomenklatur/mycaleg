@extends('layout.base_layout')

@section('content')
    <div class="container text-center mt-3 mb-4">
      <h1>Pilih daerah pemilihanmu</h1>
    </div>
    <div class="container">
      <div class="row mt-3">
        <div class="col-sm-6">
          <div class="card shadow">
            <div class="card-header bg-success">
            </div>
            <div class="card-body">
              <h5 class="card-title">Daerah Pemilihan 1</h5>
              <p class="card-text">Kecamatan Padang Hilir dan Kecamatan Tebing Tinggi Kota.</p>
              <a href="/rekomendasi/1" class="btn btn-success">Lihat rekomendasi caleg <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card shadow">
            <div class="card-header bg-success">
            </div>
            <div class="card-body">
              <h5 class="card-title">Daerah Pemilihan 2</h5>
              <p class="card-text">Kecamatan Padang Hulu dan Kecamatan Bajenis.</p>
              <a href="/rekomendasi/2" class="btn btn-success">Lihat rekomendasi caleg <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3 justify-content-center">
        <div class="col-sm-6">
          <div class="card shadow">
            <div class="card-header bg-success">
            </div>
            <div class="card-body">
              <h5 class="card-title">Daerah Pemilihan 3</h5>
              <p class="card-text">Kecamatan Rambutan.</p>
              <a href="/rekomendasi/3" class="btn btn-success">Lihat rekomendasi caleg <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection