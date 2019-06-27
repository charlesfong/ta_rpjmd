@extends('layouts.layout')

@section('content')
  @php
    $parentNya = "";
    if($TipeData == 'Misi'){
      $urlStore = route('storeEigenMisi');
      $tipeId = 'misi_id';
      $tipeId2 = 'misi2_id';
      $tipeName = 'misi';
    }
    else if($TipeData == 'Tujuan'){
      $urlStore = route('storeEigenTujuan');
      $tipeId = 'tujuan_id';
      $tipeId2 = 'tujuan2_id';
      $tipeName = 'tujuan';
    }
    else if($TipeData == 'Sasaran'){
      $urlStore = route('storeEigenSasaran');
      $tipeId = 'sasaran_id';
      $tipeId2 = 'sasaran2_id';
      $tipeName = 'sasaran';
    }
    else if($TipeData == 'Indikator'){
      $urlStore = route('storeEigenIndikator');
      $tipeId = 'indikator_id';
      $tipeId2 = 'indikator2_id';
      $tipeName = 'indikator';
    }
     
    $avg = []; 
    $arr2d = [];
  @endphp

  @if($TipeData == 'Tujuan')
  <h1 style="text-align: center; margin: 10px auto">MISI : {{ sizeof($Kriteria) > 0 ? $Kriteria[0]->misi['misi'] : "-" }}</h1>
    <select id="pilihMisi" class="form-control" style="width: 60%; margin: 10px auto">
      <option disabled="" selected="">PILIH MISI</option>
      @foreach($allMisi as $val)
        <option value="{{$val['id']}}">{{$val['misi']}}</option>
      @endforeach
    </select>
  @endif

  @if($TipeData == 'Sasaran')
  <h1 style="text-align: center; margin: 10px auto">MISI : {{ sizeof($Kriteria) > 0 ? $Kriteria[0]->tujuan->misi['misi'] : "-" }}</h1>
    <select id="pilihMisi" class="form-control" style="width: 60%; margin: 10px auto">
      <option disabled="" selected="">PILIH MISI</option>
      @foreach($allMisi as $val)
        <option value="{{$val['id']}}">{{$val['misi']}}</option>
      @endforeach
    </select>
  <h1 style="text-align: center; margin: 10px auto">TUJUAN : {{ sizeof($Kriteria) > 0 ? $Kriteria[0]->tujuan['tujuan'] : "-" }}</h1>
    <select id="tujuan" class="form-control" style="width: 60%; margin: 10px auto">
      <option disabled="" selected="">PILIH TUJUAN</option>

    </select>
  @endif

  <!-- @if($TipeData == 'Indikator')
  @php 
    if($Kriteria[0]->tujuan != null){
      $misiNyaKriteriaTerpilih = $Kriteria[0]->tujuan->misi;
    }
    else{
      $misiNyaKriteriaTerpilih = $Kriteria[0]->misi;
    }
  @endphp -->
  <h1 style="text-align: center; margin: 10px auto">MISI : {{ sizeof($Kriteria) > 0 ? $Kriteria[0]->misi['misi'] : "-" }}</h1>
    <select id="pilihMisi" class="form-control" style="width: 60%; margin: 10px auto">
      <option disabled="" selected="">PILIH MISI</option>
      
      @foreach($allMisi as $val)
        <option value="{{$val['id']}}" {{ $Kriteria[0]->misi['id'] == $val['id'] ? 'selected=""' : "" }}>{{$val['misi']}}</option>
      @endforeach
    </select>
  <h1 style="text-align: center; margin: 10px auto">TUJUAN : {{ sizeof($Kriteria) > 0 ? $Kriteria[0]->tujuan['tujuan'] : "-" }}</h1>
    <select id="tujuan" class="form-control" style="width: 60%; margin: 10px auto">
      <option disabled="" selected="">PILIH TUJUAN</option>
        @if(sizeof($Kriteria) > 0)
          @php 
            if($Kriteria[0]->tujuan != null){
              $tujuanNyaKriteria = $Kriteria[0]->tujuan->misi->tujuan;
            }
            else{
              $tujuanNyaKriteria = $Kriteria[0]->misi->tujuan;
            }
          @endphp
          @foreach($tujuanNyaKriteria as $val)
            <option value="{{$val['id']}}" {{ $Kriteria[0]->tujuan['id'] == $val['id'] ? 'selected=""' : "" }}>{{$val['tujuan']}}</option>
          @endforeach
        @endif
    </select>
  <h1 style="text-align: center; margin: 10px auto">SASARAN : {{ sizeof($Kriteria) > 0 ? $Kriteria[0]->sasaran['sasaran'] : "-" }}</h1>
    <select id="sasaran" class="form-control" style="width: 60%; margin: 10px auto">
      <option disabled="" selected="">PILIH SASARAN</option>
        @if(sizeof($Kriteria) > 0)
          @php 
            if($Kriteria[0]->sasaran != null){
              $tujuanNyaKriteria = $Kriteria[0]->sasaran->tujuan->sasaran;
            }
            else if($Kriteria[0]->tujuan != null){
              $tujuanNyaKriteria = $Kriteria[0]->tujuan->sasaran;
            }
          @endphp
          @foreach($tujuanNyaKriteria as $val)
            <option value="{{$val['id']}}" {{ $tujuanNyaKriteria == $val['id'] ? 'selected=""' : "" }}>{{$val['tujuan']}}</option>
          @endforeach
        @endif
    </select>
  @endif

  @foreach($allKriteria as $perKriteria)

  @php
    if($TipeData == 'Misi'){
      $urlPush = route('storeNilaiMisi', ['id' => $perKriteria['id']]);
    }
    else if($TipeData == 'Tujuan'){
      $urlPush = route('storeNilaiTujuan', ['id' => $perKriteria['id']]);
    }
    else if($TipeData == 'Sasaran'){
      $urlPush = route('storeNilaiSasaran', ['id' => $perKriteria['id']]);
    }
    else if($TipeData == 'Indikator'){
      $urlPush = route('storeNilaiIndikator', ['id' => $perKriteria['id']]);
    }
  @endphp

  <form method="post" action="{{ $urlPush }}" class="row-fluid margin-none well form-horizontal">
    {{ csrf_field() }}

    @php
      if($perKriteria['kriteria'])
    @endphp

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
            <td>{{$a1[$tipeName]}}</td>
            <td style="text-align:center;">
              @for($j = 9; $j > 0; $j-=2)
                <input type="radio" id="radio-{{$a1['id']}}-{{$b1['id']}}+{{$j}}" name="{{$tipeName}}[{{$a1['id']}}-{{$b1['id']}}]" value="{{$j}}">
                <label style=" margin-right: 20px !important;" for="radio-{{$a1['id']}}-{{$b1['id']}}+{{$j}}">{{$j}}</label>
              @endfor
              @for($j = 3; $j < 10; $j+=2)
                <input type="radio" id="radio-{{$a1['id']}}-{{$b1['id']}}-{{$j}}" name="{{$tipeName}}[{{$a1['id']}}-{{$b1['id']}}]" value="{{1/$j}}" required="">
                <label style=" margin-right: 20px !important;" for="radio-{{$a1['id']}}-{{$b1['id']}}-{{$j}}">{{$j}}</label>
              @endfor
            </td>
            <td>{{$b1[$tipeName]}}</td>
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
          <td>K{{$key['id']}} - {{$key[$tipeName]}}</td>

          @foreach($key->bobotkriteriamisi2 as $bobot)
            @php
              if($bobot['kriteria_id'] == $perKriteria['id']){
                $arr2d[$perKriteria['id']][$key['id']][$bobot[$tipeId]] = 1/$bobot['bobot'];
                echo '<script> console.log("['.$perKriteria['id'].']['.$key['id'].']['.$bobot[$tipeId].'] = '.(1/$bobot['bobot']).'"); </script>';
                echo '<td>'.(1/$bobot['bobot']).'</td>';
              }
            @endphp
          @endforeach

          @php
            $arr2d[$perKriteria['id']][$key['id']][$key['id']] = 1;
            echo '<script> console.log("DONE"); </script>';
          @endphp
          <td style="background-color: gray;">1.0</td>
          
          @php $idx++; @endphp
          
          @foreach($key->bobotkriteriamisi as $bobot)
            @php
              if($bobot['kriteria_id'] == $perKriteria['id']){
                $arr2d[$perKriteria['id']][$key['id']][$bobot[$tipeId2]] = $bobot['bobot'];
                echo '<td>'.$bobot['bobot'].'</td>';
              }
            @endphp
          @endforeach
        </tr>
        @endforeach

        <!-- SUM -->
        @php
          $sum = [];
          $idxSum = 1;
          $isDone = false;
          // dd($arr2d[$perKriteria['id']]);
          // for($i = 1; $i <= sizeof($arr2d[$perKriteria['id']][1]); $i++){
          //   $sum[$i] = 0;
          //   for($j = 1; $j <= sizeof($arr2d[$perKriteria['id']][1]); $j++){
          //     $sum[$i] += $arr2d[$perKriteria['id']][$j][$i];
          //   }
          // }
          foreach ($arr2d[$perKriteria['id']] as $j => $value) {
            $idxSum = 1;
            foreach ($value as $k => $isiNya) {
              if($isDone == false){
                $sum[$idxSum] = 0;
              }
              $sum[$idxSum] += $isiNya;
              $idxSum++;
            }
            if($isDone == false){
              $isDone = true;
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
          $idxKriteria = 1;
        @endphp

        {{-- @for($i = 1; $i <= sizeof($arr2d[$perKriteria['id']][1]); $i++) --}}
        @foreach ($arr2d[$perKriteria['id']] as $i => $value)
          @php
            $eigen[$i] = [];
            $avg[$perKriteria['id']][$i] = 0;
            $idxSum = 1;
          @endphp

          <tr>
            <td>{{$Kriteria[$idxKriteria-1]['id']}}</td> 
            <td>K{{$Kriteria[$idxKriteria-1]['id']}} - {{$Kriteria[$idxKriteria-1][$tipeName]}}</td>
              @foreach ($arr2d[$perKriteria['id']][$i] as $j => $value)
                @php
                  $eigen[$i][$j] = $arr2d[$perKriteria['id']][$i][$j]/$sum[$idxSum];
                  $avg[$perKriteria['id']][$i] += $eigen[$i][$j];
                  $idxSum++;
                @endphp
                <td>{{ $eigen[$i][$j] }}</td>
              @endforeach

              @php
                $avg[$perKriteria['id']][$i] = $avg[$perKriteria['id']][$i]/sizeof($arr2d[$perKriteria['id']][$i]);
                $idxKriteria++;
              @endphp
            <td>{{ $avg[$perKriteria['id']][$i] }}</td>
          </tr>
        @endforeach
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
              $idxSum = 1;
            @endphp

            @foreach ($arr2d[$perKriteria['id']] as $i => $value)
              @php
                if(sizeof($sum) == sizeof($arr2d[$perKriteria['id']])){
                  $result += $avg[$perKriteria['id']][$i]*$sum[$idxSum];
                  $idxSum++;
                }
              @endphp
            @endforeach
            <td>{{$result}}</td>
          </tr>
          <tr>
            <td>CI</td>

            @php
              $CI = 0;
              if($result-sizeof($arr2d[$perKriteria['id']]) > 0){
                $CI = ($result-sizeof($arr2d[$perKriteria['id']]))/(sizeof($arr2d[$perKriteria['id']])-1);                
              }
            @endphp

          {{-- @php dd($sum); @endphp --}}
            <td>{{$CI}}</td>
          </tr>
          <tr>
            <td>CR</td>

            <?php
              $RI = 0;
              $CR = 0;
              if(sizeof($arr2d[$perKriteria['id']]) == 3){
                $RI = 0.58;
              }
              elseif(sizeof($arr2d[$perKriteria['id']]) == 4){
                $RI = 0.9;
              }
              elseif(sizeof($arr2d[$perKriteria['id']]) == 5){
                $RI = 1.12;
              }
              elseif(sizeof($arr2d[$perKriteria['id']]) == 6){
                $RI = 1.24;
              }
              elseif(sizeof($arr2d[$perKriteria['id']]) == 7){
                $RI = 1.32;
              }
              elseif(sizeof($arr2d[$perKriteria['id']]) == 8){
                $RI = 1.41;
              }
              elseif(sizeof($arr2d[$perKriteria['id']]) == 9){
                $RI = 1.45;
              }
              elseif(sizeof($arr2d[$perKriteria['id']]) == 10){
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
              url: "{{ $urlStore }}",
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

        $('#pilihMisi').change(function(){
          @if($TipeData == 'Tujuan')
            var url = '{{ route('showNilaiTujuanById', ['id' => '']) }}';
            var idPilihan = $(this).val();
            window.location.href = url +'/'+idPilihan;
          @elseif($TipeData == 'Sasaran')
            var id = $(this).val();
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'get',
              url: "{{ route('showTujuan') }}",
              data: {
                  'id': id
              },
              success: function (data) {
                  var tujuan = data['result'];
                  $("#tujuan").empty();
                  select = document.getElementById("tujuan");

                  var opt = document.createElement('option');
                  opt.setAttribute("name", "tujuan");
                  opt.value = "";
                  opt.innerHTML = "PILIH TUJUAN";
                  select.appendChild(opt);

                  for(var i = 0; i < tujuan.length; i++){
                    var opt = document.createElement('option');
                    opt.setAttribute("name", "tujuan");
                    opt.value = tujuan[i]['id'];
                    opt.innerHTML = tujuan[i]['tujuan'];
                    select.appendChild(opt);
                    }
                },
            });
          @elseif($TipeData == 'Indikator')
            var url = '{{ route('showNilaiIndikator') }}';
            var idPilihan = $(this).val();
            window.location.href = url +'?id='+idPilihan+"&type=misi";
          @endif
        });

        $('#tujuan').change(function(){
          @if($TipeData == 'Sasaran')
            var url = '{{ route('showNilaiSasaranById', ['id' => '']) }}';
            var idPilihan = $(this).val();
            window.location.href = url +'/'+idPilihan;
          @elseif($TipeData == 'Indikator')
            var url = '{{ route('showNilaiIndikator') }}';
            var idPilihan = $(this).val();
            window.location.href = url +'?id='+idPilihan+"&type=tujuan";
          @endif
        });
     </script>
@endsection
