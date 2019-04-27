@extends('layouts.layout')

@section('content')
  @php
    if($TipeData == 'Misi'){
      $urlStore = route('storeKriteriaMisi');
    }
     
    $avg = []; 
    $arr2d = [];
  @endphp

  @foreach($allKriteria as $perKriteria)

  <form method="post" action="{{ route('storeNilaiMisi', ['id' => $perKriteria['id']]) }}" class="row-fluid margin-none well form-horizontal">
    {{ csrf_field() }}
    <h1 style="text-align: center;">{{$perKriteria['kriteria']}}</h1>
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
            <td>{{$a1['misi']}}</td>
            <td style="text-align:center;">
              @for($j = 9; $j > 0; $j-=2)
                <input type="radio" id="radio-{{$a1['id']}}-{{$b1['id']}}+{{$j}}" name="misi[{{$a1['id']}}-{{$b1['id']}}]" value="{{$j}}">
                <label style=" margin-right: 20px !important;" for="radio-{{$a1['id']}}-{{$b1['id']}}+{{$j}}">{{$j}}</label>
              @endfor
              @for($j = 3; $j < 10; $j+=2)
                <input type="radio" id="radio-{{$a1['id']}}-{{$b1['id']}}-{{$j}}" name="misi[{{$a1['id']}}-{{$b1['id']}}]" value="{{1/$j}}" required="">
                <label style=" margin-right: 20px !important;" for="radio-{{$a1['id']}}-{{$b1['id']}}-{{$j}}">{{$j}}</label>
              @endfor
            </td>
            <td>{{$b1['misi']}}</td>
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
          $arr2d[$perKriteria['id']] = [];
        @endphp

        @foreach($Kriteria as $key)
        @php
          $arr2d[$perKriteria['id']][$key['id']] = [];
        @endphp
        <tr>
          <td>{{$key['id']}}</td> 
          <td>K{{$key['id']}} - {{$key['misi']}}</td>

          @foreach($key->bobotkriteriamisi2 as $bobot)
            @php
              if($bobot['kriteria_id'] == $perKriteria['id']){
                $arr2d[$perKriteria['id']][$key['id']][$bobot['misi_id']] = 1/$bobot['bobot'];
                echo '<td>'.$bobot['bobot'].'</td>';
              }
            @endphp
          @endforeach

          @php
            $arr2d[$perKriteria['id']][$key['id']][$key['id']] = 1;
          @endphp
          <td style="background-color: gray;">1.0</td>
          
          @php $idx++; @endphp
          
          @foreach($key->bobotkriteriamisi as $bobot)
            @php
              if($bobot['kriteria_id'] == $perKriteria['id']){
                $arr2d[$perKriteria['id']][$key['id']][$bobot['misi2_id']] = $bobot['bobot'];
                echo '<td>'.$bobot['bobot'].'</td>';
              }
            @endphp
          @endforeach
        </tr>
        @endforeach

        <!-- SUM -->
        @php
          $sum = [];
          for($i = 1; $i <= sizeof($arr2d[$perKriteria['id']][1]); $i++){
            $sum[$i] = 0;
            for($j = 1; $j <= sizeof($arr2d[$perKriteria['id']][1]); $j++){
              $sum[$i] += $arr2d[$perKriteria['id']][$j][$i];
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
          $avg[$perKriteria['id']] = [];
        @endphp

        @for($i = 1; $i <= sizeof($arr2d[$perKriteria['id']][1]); $i++)
          @php
            $eigen[$i] = [];
            $avg[$perKriteria['id']][$i] = 0;
          @endphp

          <tr>
            <td>{{$Kriteria[$i-1]['id']}}</td> 
            <td>K{{$Kriteria[$i-1]['id']}} - {{$Kriteria[$i-1]['misi']}}</td>
              @for($j = 1; $j <= sizeof($arr2d[$perKriteria['id']][1]); $j++)
                @php
                  $eigen[$i][$j] = $arr2d[$perKriteria['id']][$i][$j]/$sum[$j];
                  $avg[$perKriteria['id']][$i] += $eigen[$i][$j];
                @endphp
                <td>{{ $eigen[$i][$j] }}</td>
              @endfor

              @php
                $avg[$perKriteria['id']][$i] = $avg[$perKriteria['id']][$i]/sizeof($arr2d[$perKriteria['id']][1]);
              @endphp
            <td>{{ $avg[$perKriteria['id']][$i] }}</td>
          </tr>
        @endfor
      </tbody>
    </table>

    <br>

    <!-- Matriks Eigen-->
    <span>Hasil Cek Konsistensi</span>
    <table class="table table-bordered table-striped">
      <tbody>
          <tr>
            <td>λ Max</td> 
            @php
              $result = 0;
            @endphp

            @for($j = 1; $j <= sizeof($arr2d[$perKriteria['id']][1]); $j++)
              @php
                $result += $avg[$perKriteria['id']][$j]*$sum[$j];
              @endphp
            @endfor
            <td>{{$result}}</td>
          </tr>
          <tr>
            <td>CI</td>

            @php
              $CI = 0;
              if($result-sizeof($arr2d[$perKriteria['id']][1]) > 0){
                $CI = ($result-sizeof($arr2d[$perKriteria['id']][1]))/(sizeof($arr2d[$perKriteria['id']][1])-1);                
              }
            @endphp

            <td>{{$CI}}</td>
          </tr>
          <tr>
            <td>CR</td>

            <?php
              $RI = 0;
              $CR = 0;
              if(sizeof($arr2d[$perKriteria['id']][1]) == 3){
                $RI = 0.58;
              }
              elseif(sizeof($arr2d[$perKriteria['id']][1]) == 4){
                $RI = 0.9;
              }
              elseif(sizeof($arr2d[$perKriteria['id']][1]) == 5){
                $RI = 1.12;
              }
              elseif(sizeof($arr2d[$perKriteria['id']][1]) == 6){
                $RI = 1.24;
              }
              elseif(sizeof($arr2d[$perKriteria['id']][1]) == 7){
                $RI = 1.32;
              }
              elseif(sizeof($arr2d[$perKriteria['id']][1]) == 8){
                $RI = 1.41;
              }
              elseif(sizeof($arr2d[$perKriteria['id']][1]) == 9){
                $RI = 1.45;
              }
              elseif(sizeof($arr2d[$perKriteria['id']][1]) == 10){
                $RI = 1.49;
              }

              if($CI > 0){
                $CR = $CI/$RI;
              }            
            ?>
            <td>{{$CR}}</td>
          </tr>
          <tr>
            <td>Hasil Konsistensi</td>

            @php
              $konsistensi = 'Konsisten';
              if($CR > 0.1){
                $konsistensi = 'Kurang Konsisten';
              }
            @endphp

            <td>{{$konsistensi}}</td>
          </tr>
      </tbody>
    </table>

    <br>
  @endforeach
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
     <script>
        $(document).ready(function() {
          var kriteria = <?php echo json_encode($arr2d); ?>;
          var eigen = <?php echo json_encode($avg); ?>;
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              type: 'post',
              url: "{{route('storeEigenMisi')}}",
              data: {
                  'kriteria': kriteria,
                  'eigen': eigen,
              },
              success: function (data) {
                var data = data['result'];
                console.log(data);
              },
          });
        });
     </script>
@endsection
