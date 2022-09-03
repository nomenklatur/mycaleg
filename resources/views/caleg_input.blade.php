@extends('layout.base_layout')

@section('content')
    <div class="container-sm">
      <div class="row mt-5">
        <div class="col-md-3 mx-auto">
          <div class="card">
            <img src="/images/weight.svg" class="card-img-top" alt="...">
            <div class="card-body">
              <h4 class="card-text text-center"><a href="" class="text-decoration-none">Bobot kriteria</a></h4>
            </div>
          </div>
        </div>
        <div class="col-md-3 mx-auto">
          <div class="card" style="width: 19rem">
            <img src="/images/party.svg" class="card-img-top" alt="..." style="width:17rem">
            <div class="card-body">
              <h4 class="card-text text-center"><a href="" class="text-decoration-none">Partai peserta pemilu</a></h4>
            </div>
          </div>
        </div>
        <div class="col-md-3 mx-auto">
          <div class="card" style="width: 19rem">
            <img src="/images/caleg4.svg" class="card-img-top" alt="..." style="">
            <div class="card-body">
              <h4 class="card-text text-center"><a href="" class="text-decoration-none">Calon legislatif</a></h4>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection