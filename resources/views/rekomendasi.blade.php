@extends('layout.base_layout')

@section('content')
  <div class="container">
    <p>nilai maksimum pendidikan : {{$max_pend}}</p>
    <p>nilai maksimum pengalaman : {{$max_peng}}</p>
    <p>nilai maksimum penghasilan : {{$max_phsl}}</p>
    <p>nilai maksimum kekayaan : {{$max_keka}}</p>
    <p>nilai maksimum keanggotaan : {{$max_kean}}</p>
    <div class="row mt-3">
      <div class="col-md-6">
        <table class="table">
          <tr>
            <th>nama</th>
            <th>pendidikan</th>
            <th>pengalaman</th>
            <th>penghasilan</th>
            <th>kekayaan</th>
            <th>keanggotaan</th>
            <th>Nilai preferensi</th>
          </tr>
          @foreach ($ternormalisasi as $item)
          <tr>
            <th>{{$item['nama']}}</th>
            <th>{{$item['norm_pendidikan']}}</th>
            <th>{{$item['norm_pengalaman']}}</th>
            <th>{{$item['norm_penghasilan']}}</th>
            <th>{{$item['norm_kekayaan']}}</th>
            <th>{{$item['norm_keanggotaan']}}</th>
            <th>{{$item['preference']}}</th>
          </tr>             
          @endforeach
        </table>
      </div>
    </div>
  </div>    
@endsection