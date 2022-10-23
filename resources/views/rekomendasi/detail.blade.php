@extends('layout.base_layout')

@section('content')
    <div class="container mt-3 mb-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-3 border-dark shadow rounded" style="max-width: 100%;">
            <div class="row g-0">
              <div class="col-lg-4 text-center">
                <img src="@if ($data->gambar === NULL) @if($data->jenis_kelamin === 'L') /images/male.png @else /images/female.png @endif @else {{asset('storage/'.$data->gambar)}}  @endif" class="img-fluid rounded-start" alt="..." style="max-width: 300px">
                <a href="/analisa/{{$data->uri}}/nbc" class="btn btn-outline-info rounded-pill">Analisa prediksi <i class="fa-solid fa-calculator ms-1"></i></a>
                <div class="container mt-3 justify-content-center">
                  <table class="table">
                    <tr>
                      <th>Peluang terpilih</th>
                      <td>{{$prediksi[0]}}</td>
                    </tr>
                    <tr>
                      <th>Peluang gagal</th>
                      <td>{{$prediksi[1]}}</td>
                    </tr>
                  </table>
                </div>
                <div class="container mt-2 justify-content-center">
                  @if ($prediksi[0] > $prediksi[1])
                    <p class="d-inline me-3">Prediksi :</p> <span class="badge bg-success">Terpilih</span> 
                  @else
                    <p class="d-inline me-3">Prediksi :</p> <span class="badge bg-danger">Tidak terpilih</span>
                  @endif
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card-body">
                  <div class="d-flex">
                    <div class="container mb-2">
                      <h3 class="card-title d-inline">{{$data->nama}}</h3>
                      <p>{{$data->party->kepanjangan}}</p>
                    </div>
                    <div class="container">
                      <p class="text-end me-2"><a href="/rekomendasi/{{$data->dapil_id}}" class="text-decoration-none text-danger"><i class="fa-solid fa-left-long me-1"></i> Kembali</a></p>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="container mb-2">
                      <h4 class="text-center card-title">Visi</h4>
                      <p class="card-text text-justify">{{$data->visi}}</p>
                    </div>
                    <div class="container mb-3">
                      <h4 class="text-center">Misi</h4>
                      <p class="card-text text-justify">{{$data->misi}}</p>
                    </div>
                  </div>
                  <div class="container">
                    <table class="table">
                      <tr>
                        <th>Usia</th>
                        <td>{{$umur}} Tahun</td>
                      </tr>
                      <tr>
                        <th>Pendidikan</th>
                        <td>{{$pendidikan}}</td>
                      </tr>
                      <tr>
                        <th>Penghasilan perbulan</th>
                        <td>{{$penghasilan}}</td>
                      </tr>
                      <tr>
                        <th>Nilai kekayaan pribadi</th>
                        <td>{{$kekayaan}}</td>
                      </tr>
                      <tr>
                        <th>Lama keanggotaan di partai</th>
                        <td>{{$keanggotaan}}</td>
                      </tr>
                      <tr>
                        <th>Pengalaman politik</th>
                        <td>{{$pengalaman}}</td>
                      </tr>
                    </table>
                  </div>
                  <div class="container">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection