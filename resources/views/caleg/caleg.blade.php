@extends('layout.base_layout')

@section('content')
    @if (session()->has('caleg_success'))
    <div class="alert alert-success alert-dismissible fade show position-absolute" role="alert" style="left: 75%; top: 82%;">
      <i class="bi bi-check-circle me-2"></i>{{ session('caleg_success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('delete_success'))
    <div class="alert alert-success alert-dismissible fade show position-absolute" role="alert" style="left: 75%; top: 82%;">
      <i class="bi bi-trash me-2"></i>{{ session('delete_success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('update_success'))
    <div class="alert alert-success alert-dismissible fade show position-absolute" role="alert" style="left: 75%; top: 82%;">
      <i class="bi bi-pen me-2"></i>{{ session('update_success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container">
      <div class="row justify-content-center mt-3 mb-3">
        <div class="col-md-4">
          <h3>Daftar Calon Legislatif</h3>
        </div>
        <div class="col-md-6">
          <form action="/caleg">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari')}}">
              <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </div>
          </form>
        </div>
        @auth
            <div class="col-md-2">
              <a href="/user/calegs/create" class="text-decoration-none"><button type="button" class="btn btn-outline-success"><i class="bi bi-plus-circle me-1"></i>Tambah</button></a>
            </div>
        @endauth
      </div>
    </div>
    
    @if ($caleg->count())
    <div class="container">
      <table class="table table-light">
        <thead>
          <tr class="text-center">
            <th>Nama</th>
            <th>Partai</th>
            <th>Daerah Pemilihan</th>
            @auth
                <th>Aksi</th>
            @endauth
          </tr>
        </thead>
        <tbody>
          <?php $nomor = 1 ?>
          @foreach ($caleg as $cal)
              <tr class="text-center">
                <td>{{ $cal->nama }}</td>
                <td>{{ $cal->party->nama }}</td>
                <td>{{ $cal->dapil->kecamatan}}</td>
                @auth
                    <td>
                      <a href="user/calegs/{{ $cal->uri}}/edit" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="ubah data calon legislatif"><i class="bi bi-pen me-1"></i>Ubah</a>
                      <form action="user/calegs/{{ $cal->uri}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus calon legislatif ini?')" data-bs-toggle="tooltip" data-bs-placement="top" title="hapus data calon legislatif"><i class="bi bi-trash3 me-1"></i>Hapus</button>
                      </form> 
                    </td>
                @endauth
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
    <div class="d-flex justify-content-center">
      {{ $caleg->links() }}
    </div>
@endsection