@extends('layouts.layout')

@section('content')
  @php
    if($TipeData == 'Misi'){
      $urlStore = route('storeKriteriaMisi');
    }
  @endphp
  <form method="post" action="{{ route('storeNilaiKriteriaMisi') }}" class="row-fluid margin-none well form-horizontal">
    {{ csrf_field() }}
    <table class="table table-striped" width="100%" border="0" cellspacing="0" cellpadding="4">
      <tbody>
        <tr>
          <td width="4%">No.</td>
          <td width="18%">Kriteria</td>
          <td width="55%" style="text-align:center;">Pilih Nilai</td>
          <td width="18%">Kriteria</td>
        </tr>
        @php $idx = 0; @endphp
        @for($i = 0; $i < sizeof($Kriteria); $i++)
          <?php 
            $a1 = $Kriteria[$i];
          ?>

          @for($k = $i+1; $k < sizeof($Kriteria); $k++)
          <?php 
            $b1 = $Kriteria[$k];
          ?>

          <tr>
            <td><input type="hidden" name="" value="1">{{$idx+1}}.</td>
            <td>{{$a1['kriteria']}}</td>
            <td style="text-align:center;">
              @for($j = 9; $j > 0; $j-=2)
                <input type="radio" id="radio-{{$a1['id']}}-{{$b1['id']}}+{{$j}}" name="kriteria[{{$a1['id']}}-{{$b1['id']}}]" value="{{$j}}">
                <label style=" margin-right: 20px !important;" for="radio-{{$a1['id']}}-{{$b1['id']}}+{{$j}}">{{$j}}</label>
              @endfor
              @for($j = 3; $j < 10; $j+=2)
                <input type="radio" id="radio-{{$a1['id']}}-{{$b1['id']}}-{{$j}}" name="kriteria[{{$a1['id']}}-{{$b1['id']}}]" value="{{1/$j}}" required="">
                <label style=" margin-right: 20px !important;" for="radio-{{$a1['id']}}-{{$b1['id']}}-{{$j}}">{{$j}}</label>
              @endfor
            </td>
            <td>{{$b1['kriteria']}}</td>
          </tr>
          @php $idx++; @endphp
          @endfor
        @endfor
      </tbody>
    </table>
    <button id="send" type="submit" name="btn_simpan" class="tombol-large w_biru hvr-fade">Simpan Data</button>
    </form>

    <!-- Matriks -->
    <span>Matriks Nilai Perbandingan</span>
    <table class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Kriteria</th>
        @foreach($Kriteria as $key)
          <th>K{{$key['id']}}</th>
        @endforeach
      </tr>
      </thead>
      <tbody>
        @php 
          $idx = 1; 
          $arr2d = [];
        @endphp

        @foreach($Kriteria as $key)
        @php
          $arr2d[$key['id']] = [];
        @endphp
        <tr>
          <td>{{$key['id']}}</td> 
          <td>K{{$key['id']}} - {{$key['kriteria']}}</td>

          @foreach($key->bobotkriteriamisi2 as $bobot)
            @php
              $arr2d[$key['id']][$bobot['kriteria_id']] = 1/$bobot['bobot'];
            @endphp
            <td>{{1/$bobot['bobot']}}</td>
          @endforeach

          @php
            $arr2d[$key['id']][$key['id']] = 1;
          @endphp
          <td style="background-color: gray;">1.0</td>
          
          @php $idx++; @endphp
          
          @foreach($key->bobotkriteriamisi as $bobot)
            @php
              $arr2d[$key['id']][$bobot['kriteria2_id']] = $bobot['bobot'];
            @endphp
            <td>{{$bobot['bobot']}}</td>
          @endforeach
        </tr>
        @endforeach

        <!-- SUM -->
        @php
          $sum = [];
          for($i = 1; $i <= sizeof($arr2d[1]); $i++){
            $sum[$i] = 0;
            for($j = 1; $j <= sizeof($arr2d[1]); $j++){
              $sum[$i] += $arr2d[$j][$i];
            }
          }
        @endphp
        <tr>
          <td></td> 
          <td>JUMLAH</td>
          @foreach($sum as $total)
            <td>{{$total}}</td>
          @endforeach
        </tr>

      </tfoot>
    </table>

    <br>

    <!-- Matriks Eigen-->
    <span>Normalisasi Dan Nilai Eigen</span>
    <table class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>No</th>
        <th>Kriteria</th>
        @foreach($Kriteria as $key)
          <th>K{{$key['id']}}</th>
        @endforeach
        <th>Eigen/Avg</th>
      </tr>
      </thead>
      <tbody>
        @php
          $eigen = [];
          $avg = [];
        @endphp

        @for($i = 1; $i <= sizeof($arr2d[1]); $i++)
          @php
            $eigen[$i] = [];
            $avg[$i] = 0;
          @endphp

          <tr>
            <td>{{$Kriteria[$i-1]['id']}}</td> 
            <td>K{{$Kriteria[$i-1]['id']}} - {{$Kriteria[$i-1]['kriteria']}}</td>
              @for($j = 1; $j <= sizeof($arr2d[1]); $j++)
                @php
                  $eigen[$i][$j] = $arr2d[$i][$j]/$sum[$j];
                  $avg[$i] += $eigen[$i][$j];
                @endphp
                <td>{{ $eigen[$i][$j] }}</td>
              @endfor

              @php
                $avg[$i] = $avg[$i]/sizeof($arr2d[1]);
              @endphp
            <td>{{ $avg[$i] }}</td>
          </tr>
        @endfor
      </tbody>
    </table>

    <br>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <script>
        $(document).ready(function() {

        });
     </script>
@endsection
