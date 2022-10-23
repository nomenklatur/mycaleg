@extends('layout.base_layout')

@section('content')
    <div class="container mt-3 mb-5 card border-success shadow bg-white p-3">
            <!-- Tabs navs -->
      <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a
            class="nav-link active"
            id="ex2-tab-1"
            data-bs-toggle="tab"
            href="#ex2-tabs-1"
            role="tab"
            aria-controls="ex2-tabs-1"
            aria-selected="true"
            >Matriks Awal</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link"
            id="ex2-tab-2"
            data-bs-toggle="tab"
            href="#ex2-tabs-2"
            role="tab"
            aria-controls="ex2-tabs-2"
            aria-selected="false"
            >Matriks Ternormalisasi</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link"
            id="ex2-tab-3"
            data-bs-toggle="tab"
            href="#ex2-tabs-3"
            role="tab"
            aria-controls="ex2-tabs-3"
            aria-selected="false"
            >Hasil Perhitungan</a
          >
        </li>
      </ul>
      <!-- Tabs navs -->

      <!-- Tabs content -->
      <div class="tab-content" id="ex2-content">
        <div
          class="tab-pane fade show active"
          id="ex2-tabs-1"
          role="tabpanel"
          aria-labelledby="ex2-tab-1"
        >
          <div class="container justify-content-center">
            <table class="table text-center">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Pendidikan</th>
                  <th>Pengalaman</th>
                  <th>Penghasilan</th>
                  <th>Keanggotaan</th>
                  <th>Kekayaan</th>
                </tr>
              </thead>
              @foreach ($m_awal as $awal)
                <tr>
                  <td>{{$awal->nama}}</td>
                  <td>{{$awal->pendidikan}}</td>
                  <td>{{$awal->pengalaman}}</td>
                  <td>{{$awal->penghasilan}}</td>
                  <td>{{$awal->keanggotaan}}</td>
                  <td>{{$awal->kekayaan}}</td>
                </tr>  
              @endforeach
            </table>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="ex2-tabs-2"
          role="tabpanel"
          aria-labelledby="ex2-tab-2"
        >
          <div class="container justify-content-center">
            <table class="table text-center">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Pendidikan</th>
                  <th>Pengalaman</th>
                  <th>Penghasilan</th>
                  <th>Keanggotaan</th>
                  <th>Kekayaan</th>
                </tr>
              </thead>
                @foreach ($m_normal as $normal)
                <tr>
                  <td>{{$normal['nama']}}</td>
                  <td>{{$normal['pendidikan']}}</td>
                  <td>{{$normal['pengalaman']}}</td>
                  <td>{{$normal['penghasilan']}}</td>
                  <td>{{$normal['keanggotaan']}}</td>
                  <td>{{$normal['kekayaan']}}</td>
                </tr>  
              @endforeach
            </table>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="ex2-tabs-3"
          role="tabpanel"
          aria-labelledby="ex2-tab-3"
        >
        <div class="container justify-content-center">
          <table class="table text-center">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Matriks ternormalisasi x Bobot kriteria</th>
                <th>Hasil</th>
              </tr>
            </thead>
              @foreach ($m_normal as $akhir)
              <tr>
                <td>{{$akhir['nama']}}</td>
                <td>({{$akhir['pendidikan']}} x 40) + ({{$akhir['pengalaman']}} x 25) + ({{$akhir['penghasilan']}} x 10) + ({{$akhir['keanggotaan']}} x 20) + ({{$akhir['kekayaan']}} x 5)</td>
                <td>{{$akhir['preference']}}</td>
              </tr>  
            @endforeach
          </table>
        </div>
        </div>
      </div>
      <!-- Tabs content -->
    </div>
@endsection