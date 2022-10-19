@extends('layout.base_layout')

@section('content')
  <div class="container mt-3 mb-3">
    <div class="row text-center">
      <h1>Rekomendasi Calon Legislatif</h1>
      <h5>{{ $dapil }}</h5>
    </div>
  </div>
  <div class="container mt-3 mb-3">
    <div class="row justify-content-center">
      @for ($i = 0; $i < 5; $i++)
        <div class="card border-dark m-3" style="width: 12rem;">
          <img src="@if ($result[$i]['gambar'] === NULL) @if($result[$i]['jenis_kelamin'] == 'L') /images/male.png @else /images/female.png @endif @else {{asset('storage/'.$result[0]['gambar'])}}  @endif" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title fs-6">{{$result[$i]['nama']}}</h5>
            <p class="card-subtitle mb-2 text-muted">{{$result[$i]['partai']}}</p>
            <a href="#" class="btn btn-info btn-sm">Lihat <i class="fa-regular fa-eye ms-1"></i></a>
          </div>
        </div>
      @endfor
    </div>  
    <div class="container mt-3 mb-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card border-success">
            <table class="table text-center">
              <tr>
                <th>Peringkat</th>
                <th>Nama</th>
                <th>Partai</th>
                <th>Nilai Preferensi</th>
              </tr>
              @foreach ($result as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item['nama']}}</td>
                <td>{{$item['partai']}}</td>
                <td>{{$item['preference']}}</td>
              </tr> 
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection