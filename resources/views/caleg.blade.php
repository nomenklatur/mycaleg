@extends('layout.base_layout')

@section('content')
    <div class="container">
      <div class="row justify-content-center mt-5 mb-3">
        <div class="col-md-4">
          <h3>Daftar Calon Legislatif</h3>
        </div>
        <div class="col-md-6">
          <form action="/caleg">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari')}}">
              <button class="btn btn-outline-success" type="submit">Button</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    @if ($caleg->count())
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Partai</th>
            <th>Daerah Pemilihan</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor = 1 ?>
          @foreach ($caleg as $cal)
              <tr>
                <td>{{ $nomor }}</td>
                <td>{{ $cal->nama }}</td>
                <td>{{ $cal->party->nama }}</td>
                <td>{{ $cal->dapil->kecamatan}}</td>
                @php
                    $nomor = $nomor + 1
                @endphp
              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @else
        <div class="container mt-5">
          <div class="row justify-content-center">
            <div class="col-md-4">
              <img src="/images/notfound.svg" class="img-fluid mb-3" style="width: 300px">
              <h2>caleg tidak ditemukan</h2>
            </div>
          </div>
        </div>
    @endif
@endsection