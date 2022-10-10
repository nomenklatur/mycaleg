@extends('layout.base_layout')

@section('content')
    <div class="container mt-3 mb-5">
      <div class="row mt-2 mb-3 text-center">
        <div class="col-sm-4 mx-auto">
          <h3 class="text-center">Partai peserta pemilu</h3>
            <a href="/user/parties/create" class="btn btn-outline-success mt-1 mb-2"><i class="bi bi-plus me-1"></i>Tambah</a>
        </div>
      </div>
      <div class="row mt-3 mb-2">
        @foreach ($parties as $partai)
            <div class="col-lg-3">
              <div class="card mb-3 shadow" style="width: 13rem;">
                <img src="/images/parties/{{ $partai->gambar }}" class="card-img-top" style="width: 100%; height:120px;">
                <div class="card-body text-center">
                  <h5 class="card-title text-bold"><b>{{ $partai->nama}}</b></h5>
                  <a href="/editcaleg/{{ $partai->uri }}" class="text-decoration-none"><i class="bi bi-pen me-1"></i>Ubah</a> <a href="" class="text-decoration-none text-danger ms-2"><i class="bi bi-trash3"></i>Hapus</a>
                </div>
              </div>
            </div>
        @endforeach
      </div>
    </div>
@endsection