@extends('layout.base_layout')

<!-- TODO buat perulangan untuk setiap partai, lalu filter caleg sesuai dengan id partai saat iterasi-->
@section('content')
    <div class="container mt-5">
      <div class="row">
        @foreach ($party as $item)
        <div class="col-md-3 mb-3">
          <div class="card" style="width: 16rem;">
            <img src="/images/parties/{{$item->gambar}}" class="card-img-top" alt="...">
            <div class="card-body">
              <div class="card-header">
                <h5 class="text-center">{{$item->nama}}</h5>
              </div>
              <ul class="list-group list-group-flush">
                @foreach ($dapil as $caleg)
                    @if ($caleg->party->nama == $item->nama)
                        <li class="list-group-item">{{$caleg->nama}}</li>
                    @endif
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
@endsection