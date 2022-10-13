@extends('layout.base_layout')

@section('content')
      @if (session()->has('partai_success'))
        <div class="alert alert-success alert-dismissible fade show position-absolute" role="alert" style="left: 60%; top: 15%;">
          <i class="bi bi-check-circle me-2"></i>{{ session('partai_success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if (session()->has('update_partai_success'))
        <div class="alert alert-success alert-dismissible fade show position-absolute" role="alert" style="left: 75%; top: 20%;">
          <i class="bi bi-pen me-2"></i>{{ session('update_partai_success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if (session()->has('delete_partai_success'))
        <div class="alert alert-success alert-dismissible fade show position-absolute" role="alert" style="left: 75%; top: 20%;">
          <i class="bi bi-trash me-2"></i>{{ session('delete_partai_success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    <div class="container mt-3 mb-5">
      <div class="row mt-2 mb-3 text-center">
        <div class="col-sm-4 mx-auto">
          <h3 class="text-center">Partai peserta pemilu</h3>
            <a href="/user/parties/create" class="btn btn-outline-success mt-1 mb-2"><i class="bi bi-plus me-1"></i>Tambah</a>
        </div>
      </div>
      <div class="row mt-3 mb-2">
        @foreach ($parties as $partai)
            <div class="col-lg-3 p-2">
              <div class="card mb-3 shadow" style="width: 13rem;">
                @if ($partai->gambar)
                  <img src="{{ asset('storage/'.$partai->gambar)}}" class="card-img-top" style="width: 100%; height:120px;">
                @else
                  <img src="/images/team.svg" class="card-img-top" style="width: 100%; height:120px;">
                @endif
                <div class="card-body text-center">
                  <h5 class="card-title text-bold mb-4"><b>{{ $partai->nama}}</b></h5>
                  <button class="badge rounded-pill bg-warning fs-6"><a href="/user/parties/{{ $partai->uri }}/edit" class="text-decoration-none text-dark"><i class="bi bi-pen me-1"></i>Ubah</a></button>
                  <form action="/user/parties/{{ $partai->uri }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="badge rounded-pill bg-danger fs-6" onclick="return confirm('Anda yakin akan menghapus partai ini?')"><i class="bi bi-trash3"></i>Hapus</button>
                  </form>
                </div>
              </div>
            </div>
        @endforeach
      </div>
    </div>
@endsection