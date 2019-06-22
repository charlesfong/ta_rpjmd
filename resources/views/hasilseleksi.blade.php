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

        foreach($Misis as $key => $misi){
          $hasilNilaiAkhir[$misi['id']] = 0;
          foreach ($hasilNormalisasiKriteria as $kriteriaNya) {
            foreach ($hasilNormalisasi as $perMisihasil) {
              $hasilNilaiAkhir[$misi['id']] += $perMisihasil[$misi['id']]*$kriteriaNya;
              break;
            }
          }
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
          var url = '{{ route('hasilAhpTujuanById', ['idMisi' => '']) }}';
          var idPilihan = $(this).val();
          window.location.href = url +'/'+idPilihan;
        });
       </script>
@endsection
