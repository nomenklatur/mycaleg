@extends('layout.base_layout')

@section('content')
  <div class="container mt-3 mb-3">
    <div class="row text-center">
      <h1>Rekomendasi Calon Legislatif</h1>
      <h5>{{ $dapil->kecamatan }}</h5>
      <p class="mb-3"><a href="/analisa/{{$dapil->id}}/saw" class="btn btn-info rounded-pill text-decoration-none">Lihat analisa <i class="fa-solid fa-calculator ms-1"></i></a></p>
    </div>
  </div>
  <div class="container mt-3 mb-3">
    <div class="row justify-content-center">
      @for ($i = 0; $i < 5; $i++)
        <div class="card border-success m-3 shadow" style="width: 12rem;">
          <img src="@if ($result[$i]['gambar'] === NULL) @if($result[$i]['jenis_kelamin'] == 'L') /images/male.png @else /images/female.png @endif @else {{asset('storage/'.$result[0]['gambar'])}}  @endif" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title fs-6">{{$result[$i]['nama']}}</h5>
            <p class="card-subtitle mb-2 text-muted">{{$result[$i]['partai']}}</p>
            <a href="/rekomendasi/{{$result[$i]['uri']}}/detail" class="btn btn-info btn-sm">Lihat <i class="fa-regular fa-eye ms-1"></i></a>
          </div>
        </div>
      @endfor
    </div>  
    <div class="container mt-3 mb-5">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card border-success shadow">
            <table class="table text-center fs-5" style="width: 100%">
              <thead>
                <tr>
                  <th>Peringkat</th>
                  <th>Nama</th>
                  <th>Partai</th>
                  <th>Nilai Preferensi</th>
                </tr>
              </thead>
              @foreach ($result as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td><a href="/rekomendasi/{{$item['uri']}}/detail" class="text-decoration-none">{{$item['nama']}}</a></td>
                <td>{{$item['partai']}}</td>
                <td>{{$item['preference']}} / 100</td>
              </tr> 
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection