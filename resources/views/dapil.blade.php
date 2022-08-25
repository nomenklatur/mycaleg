@extends('layout.base_layout')
<?php 
  $tester = $dapil->caleg;
  $partaiA = $tester->filter(function($value){
    return $value->party_id == 1;
  })
?>
<!-- TODO buat perulangan untuk setiap partai, lalu filter caleg sesuai dengan id partai saat iterasi-->
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card" style="width: 18rem;">
            <img src="/images/parties/1.svg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">{{ $dapil->kecamatan }}</p>
              <ul class="list-group list-group-flush">
                @foreach($partaiA as $caleg)
                  <li class="list-group-item">{{$caleg->nama}}</li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection