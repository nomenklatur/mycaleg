@extends('layout.base_layout')

@section('content')
    <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <table class="table">
            <tr>
              <th>Kriteria</th>
              <th>Bobot Kriteria</th>
            </tr>
            <tr>
              <td>Pendidikan</td>
              <td>40</td>
            </tr>
            <tr>
              <td>Pengalaman politik</td>
              <td>25</td>
            </tr>
            <tr>
              <td>Penghasilan perbulan</td>
              <td>10</td>
            </tr>
            <tr>
              <td>Kekayaan pribadi</td>
              <td>5</td>
            </tr>
            <tr>
              <td>Lama di partai</td>
              <td>20</td>
            </tr>
          </table>
        </div>
      </div>
    </div>    
@endsection