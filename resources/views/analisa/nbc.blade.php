@extends('layout.base_layout')

@section('content')
    <div class="container card justify-content-center shadow mt-3 p-3 border-success">
      <div class="row">
        <div class="col-md-6">
          <p>X1 = {{$nbc['X1']}}</p>
          <p>X2 = {{$nbc['X2']}}</p>
          <p>Jumlah data = {{$nbc['jlh_data']}}</p>
          <p>C1 (Calon legislatif terpilih) = {{$nbc['C1']}}</p>
          <p>C2 (Calon legislatif tidak terpilih = {{$nbc['C2']}}</p>
        </div>
        <div class="col-md-5">
          <h4>Rumus Naive Bayes Classifier</h4>
          <br>
          <h5>Peluang Terpilih</h5>
          <p>P(C1 | X) = P(X1 | Ci) x P(X2 | Ci) x ... x P(Xn | Ci) x P(Ci)</p>
          <p>P(C1 | X) = ({{$nbc['X1C1']}} / {{$nbc['C1']}}) x ({{$nbc['X2C1']}} / {{$nbc['C1']}}) x ({{$nbc['C1']}} / {{$nbc['jlh_data']}})</p>
          <p>P(C1 | X) = <strong>{{($nbc['X1C1'] / $nbc['C1']) * ($nbc['X2C1'] / $nbc['C1']) * ($nbc['C1'] / $nbc['jlh_data'])}}</strong></p>
          <h5>Peluang tidak terpilih</h5>
          <p>P(C2 | X) = P(X1 | Ci) x P(X2 | Ci) x ... x P(Xn | Ci) x P(Ci)</p>
          <p>P(C2 | X) = ({{$nbc['X1C2']}} / {{$nbc['C2']}}) x ({{$nbc['X2C2']}} / {{$nbc['C2']}}) x ({{$nbc['C2']}} / {{$nbc['jlh_data']}})</p>
          <p>P(C2 | X) = <b>{{($nbc['X1C2'] / $nbc['C2']) * ($nbc['X2C2'] / $nbc['C2']) * ($nbc['C2'] / $nbc['jlh_data'])}}</b></p>
        </div>
      </div>
    </div>
@endsection