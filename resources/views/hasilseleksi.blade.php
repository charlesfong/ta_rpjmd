@extends('layouts.layout')

@section('content')
  @php
    if($TipeData == 'Misi'){
      $urlStore = route('storeBobotMisi');
      $tipeMenu = 'Misi';
      $tipeTampilan = 'misi';
    }
    else if($TipeData == 'Tujuan'){
      $urlStore = route('storeBobotTujuan');
      $tipeMenu = 'Tujuan';
      $tipeTampilan = 'tujuan';
    }
    else if($TipeData == 'Sasaran'){
      $urlStore = route('storeBobotSasaran');
      $tipeMenu = 'Sasaran';
      $tipeTampilan = 'sasaran';
    }
    else if($TipeData == 'Indikator'){
      $urlStore = route('storeBobotIndikator');
      $tipeMenu = 'Indikator';
      $tipeTampilan = 'indikator';
    }
  @endphp

        @if($TipeData == 'Tujuan')
        <h1 style="text-align: center; margin: 10px auto">MISI : {{ sizeof($Misis) > 0 ? $Misis[0]->misi['misi'] : "-" }}</h1>
          <select id="pilihMisi" class="form-control" style="width: 60%; margin: 10px auto">
            <option disabled="" selected="">PILIH MISI</option>
            @foreach($allMisi as $val)
              <option value="{{$val['id']}}">{{$val['misi']}}</option>
            @endforeach
          </select>
        @endif

        @if($TipeData == 'Sasaran')
        <h1 style="text-align: center; margin: 10px auto">MISI : {{ sizeof($Misis) > 0 ? $Misis[0]->tujuan->misi['misi'] : "-" }}</h1>
          <select id="pilihMisi" class="form-control" style="width: 60%; margin: 10px auto">
            <option disabled="" selected="">PILIH MISI</option>
            @foreach($allMisi as $val)
              <option value="{{$val['id']}}">{{$val['misi']}}</option>
            @endforeach
          </select>
        <h1 style="text-align: center; margin: 10px auto">TUJUAN : {{ sizeof($Misis) > 0 ? $Misis[0]->tujuan['tujuan'] : "-" }}</h1>
        <select id="tujuan" class="form-control" style="width: 60%; margin: 10px auto">
          <option disabled="" selected="">PILIH TUJUAN</option>

        </select>
        @endif

        @if($TipeData == 'Indikator')
        @php
          if(sizeof($Misis) > 0){
            if($Misis[0]->tujuan != null){
              $misiNyaMisisTerpilih = $Misis[0]->tujuan->misi;
            }
            else if($Misis[0]->misi != null){
              $misiNyaMisisTerpilih = $Misis[0]->misi;
            }
            else{
              $misiNyaMisisTerpilih = $Misis[0]->sasaran->tujuan->misi;
            }
          }
          else{
            $misiNyaMisisTerpilih = null;
          }

        @endphp
        <h1 style="text-align: center; margin: 10px auto">MISI : {{ sizeof($Misis) > 0 ? $misiNyaMisisTerpilih['misi'] : "-" }}</h1>
          <select id="pilihMisi" class="form-control" style="width: 60%; margin: 10px auto">
            <option disabled="" selected="">PILIH MISI</option>
            @foreach($allMisi as $val)
              <option value="{{$val['id']}}" {{ $misiNyaMisisTerpilih['id'] == $val['id'] ? 'selected=""' : "" }}>{{$val['misi']}}</option>
            @endforeach
          </select>

        @if(sizeof($Misis) > 0)
          @php 
            $tujuanTerpilih = null;
            if($Misis[0]->tujuan != null){
              $tujuanNyaMisis = $Misis[0]->tujuan->misi->tujuan;
              $tujuanTerpilih = $Misis[0]->tujuan;
            }
            else if($Misis[0]->misi != null){
              $tujuanNyaMisis = $Misis[0]->misi->tujuan;
            }
            else{
              $tujuanNyaMisis = $Misis[0]->sasaran->tujuan->misi->tujuan;
              $tujuanTerpilih = $Misis[0]->sasaran->tujuan;
            }
          @endphp
        @else
          @php
            $tujuanNyaMisis = null;
          @endphp
        @endif
        <h1 style="text-align: center; margin: 10px auto">TUJUAN : {{ sizeof($Misis) > 0 ? $tujuanTerpilih['tujuan'] : "-" }}</h1>
          <select id="tujuan" class="form-control" style="width: 60%; margin: 10px auto">
            <option disabled="" selected="">PILIH TUJUAN</option>
              @if(sizeof($tujuanNyaMisis) > 0)
                @foreach($tujuanNyaMisis as $val)
                  <option value="{{$val['id']}}" {{ $tujuanTerpilih['id'] == $val['id'] ? 'selected=""' : "" }}>{{$val['tujuan']}}</option>
                @endforeach
              @endif
          </select>

        <h1 style="text-align: center; margin: 10px auto">SASARAN : {{ sizeof($Misis) > 0 ? $Misis[0]->sasaran['sasaran'] : "-" }}</h1>
          <select id="sasaran" class="form-control" style="width: 60%; margin: 10px auto">
            <option disabled="" selected="">PILIH SASARAN</option>
              @if(sizeof($Misis) > 0)
                @php 
                  if($Misis[0]->sasaran != null){
                    $tujuanNyaMisis = $Misis[0]->sasaran->tujuan->sasaran;
                  }
                  else if($Misis[0]->tujuan != null){
                    $tujuanNyaMisis = $Misis[0]->tujuan->sasaran;
                  }
                  else{
                    $tujuanNyaMisis = null;
                  }
                @endphp
                @if(sizeof($tujuanNyaMisis) > 0)
                  @foreach($tujuanNyaMisis as $val)
                    <option value="{{$val['id']}}" {{ $Misis[0]->sasaran['id'] == $val['id'] ? 'selected=""' : "" }}>{{$val['sasaran']}}</option>
                  @endforeach
                @endif
              @endif
          </select>
        @endif

        <h1>Hasil Akumulasi Kriteria</h1>
       <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Kriteria</th>
          <th>Geometrical Avg</th>
          <th>Normalisasi</th>
        </tr>
        </thead>
        <tbody>
          @php
            $hasilEigen  = [];
          @endphp
          @foreach($Kriterias as $key => $kriteria)
            @php
              $totalEigen = 1;
              $totalUser = 0;
              $hasilEigen[$key] = 0;
              foreach($kriteria->eigenkriteriamisi as $eigenKriteria){
                $totalEigen *= $eigenKriteria['eigen'];
                $totalUser++;
              }
              $hasilEigen[$key] = pow($totalEigen, (1/$totalUser));
            @endphp
          @endforeach
          @php
            $totGeo = array_sum($hasilEigen);
            $totNormalisasi = 0;
            $hasilNormalisasiKriteria = [];
            foreach($Kriterias as $key => $kriteria){
              $hasilNormalisasiKriteria[$key] = $hasilEigen[$key]/$totGeo;
              $totNormalisasi += $hasilNormalisasiKriteria[$key];
            }
          @endphp

          @foreach($Kriterias as $key => $kriteria)
            <tr>
              <td>{{$kriteria['kriteria']}}</td>
              <td>{{$hasilEigen[$key]}}</td>
              <td>{{$hasilNormalisasiKriteria[$key]}}</td>
            </tr>
          @endforeach
          <tr>
            <td></td>
            <td>{{$totGeo}}</td>
            <td>{{$totNormalisasi}}</td>
          </tr>
        </tbody>
      </table>
      <br>

      @php
        $hasilNormalisasi = [];
      @endphp
      @foreach($Kriterias as $kriteriaNya)
        <h1>Hasil Akumulasi {{$tipeMenu}} dengan Kriteria {{$kriteriaNya['kriteria']}}</h1>
         <table class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>{{$tipeMenu}}</th>
            <th>Geometrical Avg</th>
            <th>Normalisasi</th>
          </tr>
          </thead>
          <tbody>
            @php
              $hasilEigen = [];
            @endphp
            @foreach($Misis as $key => $misi)
              @php
                $totalEigen = 1;
                $totalUser = 0;
                $hasilEigen[$key] = 0;
                foreach($misi->eigenmisi as $eigenKriteria){
                  if($eigenKriteria['kriteria_id'] == $kriteriaNya['id']){
                    $totalEigen *= $eigenKriteria['eigen'];
                    $totalUser++;
                  }
                }
                $hasilEigen[$key] = pow($totalEigen, (1/$totalUser));
              @endphp
            @endforeach
            @php
              $totGeo = array_sum($hasilEigen);
              $totNormalisasi = 0;
              $hasilNormalisasi[$kriteriaNya['id']] = [];
              foreach($Misis as $key => $misi){
                $hasilNormalisasi[$kriteriaNya['id']][$misi['id']] = $hasilEigen[$key]/$totGeo;
                $totNormalisasi += $hasilNormalisasi[$kriteriaNya['id']][$misi['id']];
              }
            @endphp

            @foreach($Misis as $key => $misi)
              <tr>
                <td>{{$misi[$tipeTampilan]}}</td>
                <td>{{$hasilEigen[$key]}}</td>
                <td>{{$hasilNormalisasi[$kriteriaNya['id']][$misi['id']]}}</td>
              </tr>
            @endforeach
            <tr>
              <td></td>
              <td>{{$totGeo}}</td>
              <td>{{$totNormalisasi}}</td>
            </tr>
          </tbody>
        </table>
        <br>
      @endforeach

      @php
        $hasilNilaiAkhir = [];
        $temp = " ";
        foreach($Misis as $key => $misi){
          $hasilNilaiAkhir[$misi['id']] = 0;
          foreach ($hasilNormalisasiKriteria as $kunciKriteria => $kriteriaNya) {
            foreach ($hasilNormalisasi as $kunciKriteria2 => $perMisihasil) {
              foreach ($perMisihasil as $kunci => $misiNya) {
                if($kunci == $misi['id'] && $kunciKriteria == ($kunciKriteria2-1)){
                  $temp .= $misiNya." * ".$kriteriaNya;
                  $hasilNilaiAkhir[$misi['id']] += $misiNya*$kriteriaNya;
                  break;
                }
              }
              $temp .= " + ";
            }
          }
          // dd($temp);
        }
        
      @endphp
      <h1>Hasil {{$tipeMenu}}</h1>
       <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>{{$tipeMenu}}</th>
          <th>Nilai</th>
          <th>Ranking</th>
        </tr>
        </thead>
        <tbody>
          @foreach($Misis as $key => $misi)
            <tr>
              <td>{{$misi[$tipeTampilan]}}</td>
              <td>{{$hasilEigen[$key]}}</td>
              <td>{{$hasilNilaiAkhir[$misi['id']]}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <br>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
       <script>
     $(document).ready(function() {

        $(document).ready(function() {
          var hasilBobot = <?php echo json_encode($hasilNilaiAkhir); ?>;
          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              type: 'post',
              url: "{{ $urlStore }}",
              data: {
                  'hasilBobot': hasilBobot,
              },
              success: function (data) {
                var data = data['result'];
                console.log(data);
              },
          });
        });
    });
     $('#pilihMisi').change(function(){
          @if($TipeData == 'Tujuan')
            var url = '{{ route('hasilAhpTujuanById', ['idMisi' => '']) }}';
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
            var url = '{{ route('hasilAhpIndikator') }}';
            var idPilihan = $(this).val();
            window.location.href = url +'?id='+idPilihan+"&type=misi";
          @endif
        });
     $('#tujuan').change(function(){
          @if($TipeData == 'Sasaran')
            var url = '{{ route('hasilAhpSasaranById', ['id' => '']) }}';
            var idPilihan = $(this).val();
            window.location.href = url +'/'+idPilihan;
          @elseif($TipeData == 'Indikator')
            var url = '{{ route('hasilAhpIndikator') }}';
            var idPilihan = $(this).val();
            window.location.href = url +'?id='+idPilihan+"&type=tujuan";
          @endif
        });

      $('#sasaran').change(function(){
        @if($TipeData == 'Indikator')
          var url = '{{ route('hasilAhpIndikator') }}';
          var idPilihan = $(this).val();
          window.location.href = url +'?id='+idPilihan+"&type=sasaran";
        @endif
      });
       </script>
@endsection
