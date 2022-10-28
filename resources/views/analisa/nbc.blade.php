@extends('layout.base_layout')

@section('content')
    <div class="container card justify-content-center shadow mt-3 p-3 border-success mb-5">
      <div class="row">
        <div class="col-md-4">
          <p>X1 (Partai) = {{$nbc['X1']}}</p>
          <p>X2 (Daerah Pemilihan) = {{$nbc['X2']}}</p>
          <p>X3 (Pendidikan) = {{$nbc['X3']}}</p>
          <p>X4 (Jenis Kelamin) = {{$nbc['X4']}}</p>
          <p>C1 (Calon legislatif terpilih) = {{$nbc['C1']}}</p>
          <p>C2 (Calon legislatif tidak terpilih = {{$nbc['C2']}}</p>
          <p>Jumlah data = {{$nbc['jlh_data']}}</p>
          <table class="table">
            <tr>
              <th></th>
              <th>C1</th>
              <th>C2</th>
            </tr>
            <tr>
              <th>X1</th>
              <td>{{$nbc['X1C1']}}</td>
              <td>{{$nbc['X1C2']}}</td>
            </tr>
            <tr>
              <th>X2</th>
              <td>{{$nbc['X2C1']}}</td>
              <td>{{$nbc['X2C2']}}</td>
            </tr>
            <tr>
              <th>X3</th>
              <td>{{$nbc['X3C1']}}</td>
              <td>{{$nbc['X3C2']}}</td>
            </tr>
            <tr>
              <th>X4</th>
              <td>{{$nbc['X4C1']}}</td>
              <td>{{$nbc['X4C2']}}</td>
            </tr>
          </table>
        </div>
        <div class="col-md-8">
          <h4>Rumus Naive Bayes Classifier</h4>
          <br>
          <h5>Peluang Terpilih</h5>
          <p>P(C1 | X) = P(X1 | Ci) x P(X2 | Ci) x ... x P(Xn | Ci) x P(Ci)</p>
          @if ($nbc['laplacian'])
            <p>P(C1 | X) = ({{$nbc['X1C1']}} + 1 / {{$nbc['C1']}} + {{$nbc['jlh_partai']}}) x ({{$nbc['X2C1']}} + 1 / {{$nbc['C1']}} + {{$nbc['jlh_dapil']}}) x ({{$nbc['X3C1']}} + 1 / {{$nbc['C1']}} + 5) x ({{$nbc['X4C1']}} + 1 / {{$nbc['C1']}} + 2) x ({{$nbc['C1']}} / {{$nbc['jlh_data']}})</p> 
          @else
            <p>P(C1 | X) = ({{$nbc['X1C1']}} / {{$nbc['C1']}}) x ({{$nbc['X2C1']}} / {{$nbc['C1']}}) x ({{$nbc['X3C1']}} / {{$nbc['C1']}}) x ({{$nbc['X4C1']}} / {{$nbc['C1']}}) x ({{$nbc['C1']}} / {{$nbc['jlh_data']}})</p>
          @endif
          <p>P(C1 | X) = <strong>{{$nbc['prob_ya']}}</strong></p>
          <h5>Peluang tidak terpilih</h5>
          <p>P(C2 | X) = P(X1 | Ci) x P(X2 | Ci) x ... x P(Xn | Ci) x P(Ci)</p>
          @if ($nbc['laplacian'])
            <p>P(C2 | X) = ({{$nbc['X1C2']}} + 1 / {{$nbc['C2']}} + {{$nbc['jlh_partai']}}) x ({{$nbc['X2C2']}} + 1 / {{$nbc['C2']}} + {{$nbc['jlh_dapil']}}) x ({{$nbc['X3C2']}} + 1 / {{$nbc['C2']}} + 5) x ({{$nbc['X4C2']}} + 1 / {{$nbc['C2']}} + 2) x ({{$nbc['C2']}} / {{$nbc['jlh_data']}})</p>
          @else
            <p>P(C2 | X) = ({{$nbc['X1C2']}} / {{$nbc['C2']}}) x ({{$nbc['X2C2']}} / {{$nbc['C2']}}) x ({{$nbc['X3C2']}} / {{$nbc['C2']}}) x ({{$nbc['X4C2']}} / {{$nbc['C2']}}) x ({{$nbc['C2']}} / {{$nbc['jlh_data']}})</p>
          @endif
          <p>P(C2 | X) = <b>{{$nbc['prob_tidak']}}</b></p>
        </div>
      </div>
    </div>
@endsection