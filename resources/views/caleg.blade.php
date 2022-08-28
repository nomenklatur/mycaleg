@extends('layout.base_layout')

@section('content')
    <div class="container mt-4">
      <h2>Daftar Calon Legislatif</h2>
    </div>
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
@endsection