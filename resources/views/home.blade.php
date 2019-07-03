<!DOCTYPE html>
<html lang="en">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link href="https://cdn.jsdelivr.net/npm/startbootstrap-modern-business@4.1.1/css/modern-business.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<head>
  

<style>

html,body{
       width: 100%;
     height: 100%;
}

 body {
    
}

#circle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
  width: 150px;
    height: 150px;  
}

.loader {
    width: calc(100% - 0px);
  height: calc(100% - 0px);
  border: 8px solid #162534;
  border-top: 8px solid #09f;
  border-radius: 50%;
  animation: rotate 5s linear infinite;
}
.imgz{
  background-image: url('https://visualpharm.com/assets/314/Admin-595b40b65ba036ed117d36fe.svg');
  background-repeat: no-repeat;
  background-position: center; 
}
@keyframes rotate {
100% {transform: rotate(360deg);}
} 
</style>
</head>
<body>
  <div id="load">
    <div id="circle">
      <div class="loader">
        <div class="loader">
          <div class="loader">
           <div class="loader">

           </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
  <div id="contents">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">E-RPJMD</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <div class="dropdown">
                <form action="{{route('showLogin')}}" method="get">
                  <button class="btn btn-secondary" type="submit" aria-haspopup="true" aria-expanded="false">Login</button>
                </form>
              </div>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="services.html">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div style="padding: 80px;margin: auto;padding-top: 10px;">
        @php
            $Misis = App\Visi::first()->Misi->sortByDesc('bobot');
        @endphp
        <h3 style="text-align: center;">VISI : </h3>
        <h2 style="text-align: center;">{{ App\Visi::first()['visi'] }}</h2>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
              <!-- /.box -->

              <div class="box">
                <div class="box-header">
                  <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead style="text-align: center;">
                    <tr>
                      <th rowspan="3" style="vertical-align: inherit;">Misi</th>
                      <th rowspan="3" style="vertical-align: inherit;">Tujuan</th>
                      <th rowspan="3" style="vertical-align: inherit;">Sasaran</th>
                      <th rowspan="3" style="vertical-align: inherit;">Indikator</th>
                      <th rowspan="2" style="vertical-align: inherit;">Kondisi Awal</th>
                      <th colspan="4" style="vertical-align: inherit;">Target Capaian</th>
                      <th rowspan="3" style="vertical-align: inherit;">Kondisi Akhir</th>
                    </tr>
                    <tr>
                      <th style="vertical-align: inherit;">{{ (Carbon\Carbon::now()->year)+1 }}</th>
                      <th style="vertical-align: inherit;">{{ (Carbon\Carbon::now()->year)+2 }}</th>
                      <th style="vertical-align: inherit;">{{ (Carbon\Carbon::now()->year)+3 }}</th>
                      <th style="vertical-align: inherit;">{{ (Carbon\Carbon::now()->year)+4 }}</th>
                    </tr>
                    <tr>
                      <th style="vertical-align: inherit;">(n-2)</th>
                      <th style="vertical-align: inherit;">(n)</th>
                      <th style="vertical-align: inherit;">(n+1)</th>
                      <th style="vertical-align: inherit;">(n+2)</th>
                      <th style="vertical-align: inherit;">(n+3)</th>
                    </tr>
                    {{-- <tr>
                      <th>Kondisi Akhir</th>
                    </tr> --}}
                    </thead>
                    <tbody>

                      @foreach($Misis as $misi)
                        @php
                          $awalanMisiIndikator = false;

                          // $totalBaris = 1;
                          // if( sizeof($misi->tujuanSort) > 0){
                          //   $totalBaris = sizeof($misi->tujuanSort);
                          //   if(sizeof($misi->tujuanSort) > 1){
                          //     $totalBaris--;
                          //   }                   
                          // }
                          // foreach ($misi->tujuanSort as $setiapTujuan) {
                          //   $totalBaris += sizeof($setiapTujuan->sasaranSort);
                          //   if(sizeof($setiapTujuan->sasaranSort) > 1){
                          //     $totalBaris--;
                          //   }
                          //   foreach ($setiapTujuan->sasaranSort as $setiapSasaran){
                          //     $totalBaris += sizeof($setiapSasaran->indikatorSort);
                          //     if(sizeof($setiapSasaran->indikatorSort) > 1){
                          //       $totalBaris--;
                          //     }
                          //   }

                          //   // indikator punya
                          //   if(sizeof($setiapTujuan->indikatorSort) > 0 && sizeof($setiapTujuan->sasaranSort) < 1){
                          //     $totalBaris += sizeof($setiapTujuan->indikatorSort);
                          //     if(sizeof($setiapTujuan->indikatorSort) > 1){
                          //       $totalBaris--;
                          //     }
                          //   }
                          // }

                          $totalBaris = 0;
                          foreach ($misi->tujuanSort as $tujuan) {
                            foreach ($tujuan->sasaranSort as $sasaran) {
                              foreach ($sasaran->indikatorSort as $indikator) {
                                $totalBaris++;
                              }
                              if(sizeof($sasaran->indikatorSort) < 1){
                                $totalBaris++;
                              }
                            }
                            if(sizeof($tujuan->indikatorSort) > 0){
                              if($totalBaris > 0){
                                $totalBaris += sizeof($tujuan->indikatorSort);
                              }
                              else{
                                $totalBaris = sizeof($tujuan->indikatorSort);
                              }
                            }
                            if(sizeof($tujuan->sasaranSort) < 1){
                              $totalBaris++;
                            }
                            // dd($totalBaris);
                          }

                          if( sizeof($misi->indikatorSort) > 0){
                            if($totalBaris > 0){
                              $totalBaris += sizeof($misi->indikatorSort);
                              $awalanMisiIndikator = true;
                            }
                            else{
                              $totalBaris = sizeof($misi->indikatorSort);
                              $awalanMisiIndikator = true;
                            }
                          }
                        @endphp
                        <tr>
                          <td rowspan="{{$totalBaris}}">{{$misi['misi']}}</td>
                          @if(sizeof($misi->tujuanSort) > 0 && !$awalanMisiIndikator)
                            @php
                              $awalanTujuanIndikator = false;
                              $totalBaris = 1;
                              if( sizeof($misi->tujuanSort[0]->sasaranSort) > 0){
                                $totalBaris = sizeof($misi->tujuanSort[0]->sasaranSort);
                              }
                              foreach ($misi->tujuanSort[0]->sasaranSort as $setiapIndikator) {
                                $totalBaris += sizeof($setiapIndikator->indikatorSort);
                                if(sizeof($setiapIndikator->indikatorSort) > 0){
                                  $totalBaris--;
                                }
                              }
                              if(sizeof($misi->tujuanSort[0]->indikatorSort) > 0){
                                if($totalBaris > 0){
                                  $totalBaris += sizeof($misi->tujuanSort[0]->indikatorSort);
                                  $awalanTujuanIndikator = true;
                                }
                                else{
                                  $totalBaris = sizeof($misi->tujuanSort[0]->indikatorSort);
                                  $awalanTujuanIndikator = true;
                                }
                              }
                            @endphp
                            <td rowspan="{{$totalBaris}}">{{$misi->tujuanSort[0]['tujuan']}}</td>
                            @if(sizeof($misi->tujuanSort[0]->sasaranSort) > 0 && !$awalanTujuanIndikator)
                              @php
                                $totalBaris = 1;
                                if( sizeof($misi->tujuanSort[0]->sasaranSort[0]->indikatorSort) > 0){
                                  $totalBaris = sizeof($misi->tujuanSort[0]->sasaranSort[0]->indikatorSort);
                                }
                              @endphp
                              <td rowspan="{{$totalBaris}}">{{$misi->tujuanSort[0]->sasaranSort[0]['sasaran']}}</td>
                              @if(sizeof($misi->tujuanSort[0]->sasaranSort[0]->indikatorSort) > 0)
                                <td>{{$misi->tujuanSort[0]->sasaranSort[0]->indikatorSort[0]['indikator']}}</td>
                                <td>{{$misi->tujuanSort[0]->sasaranSort[0]->indikatorSort[0]['n-2']}}</td>
                                <td>{{$misi->tujuanSort[0]->sasaranSort[0]->indikatorSort[0]['n']}}</td>
                                <td>{{$misi->tujuanSort[0]->sasaranSort[0]->indikatorSort[0]['n+1']}}</td>
                                <td>{{$misi->tujuanSort[0]->sasaranSort[0]->indikatorSort[0]['n+2']}}</td>
                                <td>{{$misi->tujuanSort[0]->sasaranSort[0]->indikatorSort[0]['n+3']}}</td>
                                <td>{{$misi->tujuanSort[0]->sasaranSort[0]->indikatorSort[0]['kondisi_akhir']}}</td>
                              @else
                                <td>-</td>
                              @endif
                            @elseif($awalanTujuanIndikator)
                              <td></td>
                              <td>{{$misi->tujuanSort[0]->indikatorSort[0]['indikator']}}</td>
                              <td>{{$misi->tujuanSort[0]->indikatorSort[0]['n-2']}}</td>
                              <td>{{$misi->tujuanSort[0]->indikatorSort[0]['n']}}</td>
                              <td>{{$misi->tujuanSort[0]->indikatorSort[0]['n+1']}}</td>
                              <td>{{$misi->tujuanSort[0]->indikatorSort[0]['n+2']}}</td>
                              <td>{{$misi->tujuanSort[0]->indikatorSort[0]['n+3']}}</td>
                              <td>{{$misi->tujuanSort[0]->indikatorSort[0]['kondisi_akhir']}}</td>
                            @else
                              <td>-</td>
                              <td>-</td>
                            @endif
                          @elseif($awalanMisiIndikator)
                            <td></td>
                            <td></td>
                            <td>{{$misi->indikatorSort[0]['indikator']}}</td>
                              <td>{{$misi->indikatorSort[0]['n-2']}}</td>
                              <td>{{$misi->indikatorSort[0]['n']}}</td>
                              <td>{{$misi->indikatorSort[0]['n+1']}}</td>
                              <td>{{$misi->indikatorSort[0]['n+2']}}</td>
                              <td>{{$misi->indikatorSort[0]['n+3']}}</td>
                              <td>{{$misi->indikatorSort[0]['kondisi_akhir']}}</td>
                          @else
                            <td>-</td>
                          @endif
                        </tr>
                        @if(!$awalanMisiIndikator)
                          {{-- KHUSUS KALAU ADA ROWSPAN INDIKATOR TUJUAN --}}
                          @if($awalanTujuanIndikator)
                            @for($i = 1; $i < sizeof($misi->tujuanSort[0]->indikatorSort); $i++)
                              <tr>
                                <td></td>
                                <td>{{$misi->tujuanSort[0]->indikatorSort[$i]['indikator']}}</td>
                                <td>{{$misi->tujuanSort[0]->indikatorSort[$i]['n-2']}}</td>
                                <td>{{$misi->tujuanSort[0]->indikatorSort[$i]['n']}}</td>
                                <td>{{$misi->tujuanSort[0]->indikatorSort[$i]['n+1']}}</td>
                                <td>{{$misi->tujuanSort[0]->indikatorSort[$i]['n+2']}}</td>
                                <td>{{$misi->tujuanSort[0]->indikatorSort[$i]['n+3']}}</td>
                                <td>{{$misi->tujuanSort[0]->indikatorSort[$i]['kondisi_akhir']}}</td>
                              </tr>
                            @endfor
                            {{-- //untuk sasaran selanjutnya --}}
                            @for($i = 0; $i < sizeof($misi->tujuanSort[0]->sasaranSort); $i++)
                              @php
                                $totalBaris = 1;
                                if( sizeof($misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort) > 0){
                                  $totalBaris = sizeof($misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort);
                                }
                              @endphp
                              <tr>
                                <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[0]->sasaranSort[$i]['sasaran']}}</td>
                                @if(sizeof($misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort) > 0)
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['indikator']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['n-2']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['n']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['n+1']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['n+2']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['n+3']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['kondisi_akhir']}}</td>
                                @else
                                  <td>-</td>
                                @endif
                              </tr>
                              {{-- SISA INDIKATORNTYA --}}
                              @for($j = 1; $j < sizeof($misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort); $j++)
                                <tr>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['indikator']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['n-2']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['n']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['n+1']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['n+2']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['n+3']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['kondisi_akhir']}}</td>
                                </tr>
                              @endfor
                            @endfor
                            {{-- //untuk tujuan selanjutnya --}}
                            @for($i = 1; $i < sizeof($misi->tujuanSort); $i++)
                              <tr>
                                @php
                                  $awalanTujuanIndikator = false;
                                  $totalBaris = 1;
                                  if( sizeof($misi->tujuanSort[$i]->sasaranSort) > 0){
                                    $totalBaris = sizeof($misi->tujuanSort[$i]->sasaranSort);                    
                                  }
                                  foreach ($misi->tujuanSort[$i]->sasaranSort as $setiapSasaran) {
                                    $totalBaris += sizeof($setiapSasaran->indikatorSort);
                                    if(sizeof($setiapSasaran->indikatorSort) > 0){
                                      $totalBaris--;
                                    }
                                  }
                                  if( sizeof($misi->tujuanSort[$i]->indikatorSort) > 0){
                                    if($totalBaris > 0){
                                      $totalBaris += sizeof($misi->tujuanSort[$i]->indikatorSort);
                                      $awalanTujuanIndikator = true;
                                    }
                                    else{
                                      $totalBaris = sizeof($misi->tujuanSort[$i]->indikatorSort);
                                      $awalanTujuanIndikator = true;
                                      dd($totalBaris);
                                    }
                                  }
                                @endphp
                                <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[$i]['tujuan']}}</td>
                                <!-- Sasaran Nya -->
                                @if(sizeof($misi->tujuanSort[$i]->sasaranSort) > 0 && !$awalanTujuanIndikator)
                                  @php
                                    $totalBaris = 1;
                                    if( sizeof($misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort) > 0){
                                      $totalBaris = sizeof($misi->tujuanSort[0]->sasaranSort[0]->indikatorSort);
                                    }
                                  @endphp
                                  <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[$i]->sasaranSort[0]['sasaran']}}</td>
                                  <!-- Indikator Nya -->
                                  @if(sizeof($misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort) > 0)
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['indikator']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n-2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n+1']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n+2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n+3']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['kondisi_akhir']}}</td>
                                  @else
                                    <td>-</td>
                                  @endif
                                @elseif($awalanTujuanIndikator)
                                  <td></td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['indikator']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n-2']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n+1']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n+2']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n+3']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['kondisi_akhir']}}</td>
                                @else
                                  <td>-</td>
                                  <td>-</td>
                                @endif
                              </tr>                      
                              @if(!$awalanTujuanIndikator)
                                @for($j = 1; $j < sizeof($misi->tujuanSort[$i]->sasaranSort); $j++)
                                  @php
                                    $totalBaris = 1;
                                    if( sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort) > 0){
                                      $totalBaris = sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort);
                                    }
                                  @endphp
                                  <tr>
                                    <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[$i]->sasaranSort[$j]['sasaran']}}</td>
                                    @if(sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort) > 0)
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['indikator']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n-2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+1']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+3']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['kondisi_akhir']}}</td>
                                    @else
                                      <td>-</td>
                                    @endif
                                  </tr>
                                  {{-- SISA INDIKATORNTYA --}}
                                  @for($k = 1; $k < sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort); $k++)
                                    <tr>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['indikator']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n-2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+1']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+3']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['kondisi_akhir']}}</td>
                                    </tr>
                                  @endfor
                                @endfor
                              @else
                                {{-- //untuk indikator tujuan selanjutnya --}}
                                @for($j = 1; $j < sizeof($misi->tujuanSort[$i]->indikatorSort); $j++)
                                  <tr>
                                    <td></td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['indikator']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n-2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n+1']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n+2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n+3']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['kondisi_akhir']}}</td>
                                  </tr>
                                  {{-- @php dd($misi->tujuanSort[$i]->indikatorSort[$j]['indikator']) @endphp --}}
                                @endfor
                                {{-- //untuk sasaran selanjutnya --}}
                                @for($j = 0; $j < sizeof($misi->tujuanSort[$i]->sasaranSort); $j++)
                                  @php
                                    $totalBaris = 1;
                                    if( sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort) > 0){
                                      $totalBaris = sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort);
                                    }
                                  @endphp
                                  <tr>
                                    <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[$i]->sasaranSort[$j]['sasaran']}}</td>
                                    @if(sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort) > 0)
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['indikator']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n-2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+1']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+3']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['kondisi_akhir']}}</td>
                                    @else
                                      <td>-</td>
                                    @endif
                                  </tr>
                                  {{-- SISA INDIKATORNTYA --}}
                                  @for($k = 1; $k < sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort); $k++)
                                    <tr>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['indikator']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n-2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+1']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+3']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['kondisi_akhir']}}</td>
                                    </tr>
                                  @endfor
                                @endfor
                              @endif
                            @endfor


                          @else
                            {{-- //untuk sasaran selanjutnya --}}
                            @for($i = 1; $i < sizeof($misi->tujuanSort[0]->sasaranSort); $i++)
                              @php
                                $totalBaris = 1;
                                if( sizeof($misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort) > 0){
                                  $totalBaris = sizeof($misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort);
                                }
                              @endphp
                              <tr>
                                <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[0]->sasaranSort[$i]['sasaran']}}</td>
                                @if(sizeof($misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort) > 0)
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['indikator']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['n-2']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['n']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['n+1']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['n+2']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['n+3']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[0]['kondisi_akhir']}}</td>
                                @else
                                  <td>-</td>
                                @endif
                              </tr>
                              {{-- SISA INDIKATORNTYA --}}
                              @for($j = 1; $j < sizeof($misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort); $j++)
                                <tr>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['indikator']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['n-2']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['n']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['n+1']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['n+2']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['n+3']}}</td>
                                  <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['kondisi_akhir']}}</td>
                                </tr>
                              @endfor
                            @endfor
                            {{-- //untuk tujuan selanjutnya --}}
                            @for($i = 1; $i < sizeof($misi->tujuanSort); $i++)
                              <tr>
                                @php
                                  $awalanTujuanIndikator = false;
                                  $totalBaris = 1;
                                  if( sizeof($misi->tujuanSort[$i]->sasaranSort) > 0){
                                    $totalBaris = sizeof($misi->tujuanSort[$i]->sasaranSort);                    
                                  }
                                  foreach ($misi->tujuanSort[$i]->sasaranSort as $setiapSasaran) {
                                    $totalBaris += sizeof($setiapSasaran->indikatorSort);
                                    if(sizeof($setiapSasaran->indikatorSort) > 0){
                                      $totalBaris--;
                                    }
                                  }
                                  if( sizeof($misi->tujuanSort[$i]->indikatorSort) > 0){
                                    if($totalBaris > 1){
                                      $totalBaris += sizeof($misi->tujuanSort[$i]->indikatorSort);
                                      $awalanTujuanIndikator = true;
                                    }
                                    else{
                                      $totalBaris = sizeof($misi->tujuanSort[$i]->indikatorSort);
                                      $awalanTujuanIndikator = true;
                                    }
                                  }
                                @endphp
                                <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[$i]['tujuan']}}</td>
                                <!-- Sasaran Nya -->
                                @if(sizeof($misi->tujuanSort[$i]->sasaranSort) > 0 && !$awalanTujuanIndikator)
                                  @php
                                    $totalBaris = 1;
                                    if( sizeof($misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort) > 0){
                                      $totalBaris = sizeof($misi->tujuanSort[0]->sasaranSort[0]->indikatorSort);
                                    }
                                  @endphp
                                  <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[$i]->sasaranSort[0]['sasaran']}}</td>
                                  <!-- Indikator Nya -->
                                  @if(sizeof($misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort) > 0)
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['indikator']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n-2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n+1']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n+2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n+3']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['kondisi_akhir']}}</td>
                                  @else
                                    <td>-</td>
                                  @endif
                                @elseif($awalanTujuanIndikator)
                                  <td></td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['indikator']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n-2']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n+1']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n+2']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n+3']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['kondisi_akhir']}}</td>
                                @else
                                  <td>-</td>
                                  <td>-</td>
                                @endif
                              </tr>                      
                              @if(!$awalanTujuanIndikator)
                                @for($j = 1; $j < sizeof($misi->tujuanSort[$i]->sasaranSort); $j++)
                                  @php
                                    $totalBaris = 1;
                                    if( sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort) > 0){
                                      $totalBaris = sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort);
                                    }
                                  @endphp
                                  <tr>
                                    <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[$i]->sasaranSort[$j]['sasaran']}}</td>
                                    @if(sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort) > 0)
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['indikator']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n-2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+1']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+3']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['kondisi_akhir']}}</td>
                                    @else
                                      <td>-</td>
                                    @endif
                                  </tr>
                                  {{-- SISA INDIKATORNTYA --}}
                                  @for($k = 1; $k < sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort); $k++)
                                    <tr>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['indikator']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n-2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+1']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+3']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['kondisi_akhir']}}</td>
                                    </tr>
                                  @endfor
                                @endfor
                              @else
                                {{-- //untuk indikator tujuan selanjutnya --}}
                                @for($j = 1; $j < sizeof($misi->tujuanSort[$i]->indikatorSort); $j++)
                                  <tr>
                                    <td></td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['indikator']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n-2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n+1']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n+2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n+3']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['kondisi_akhir']}}</td>
                                  </tr>
                                @endfor
                                {{-- //untuk sasaran selanjutnya --}}
                                @for($j = 0; $j < sizeof($misi->tujuanSort[$i]->sasaranSort); $j++)
                                  @php
                                    $totalBaris = 1;
                                    if( sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort) > 0){
                                      $totalBaris = sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort);
                                    }
                                  @endphp
                                  <tr>
                                    <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[$i]->sasaranSort[$j]['sasaran']}}</td>
                                    @if(sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort) > 0)
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['indikator']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n-2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+1']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+3']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['kondisi_akhir']}}</td>
                                    @else
                                      <td>-</td>
                                    @endif
                                  </tr>
                                  {{-- SISA INDIKATORNTYA --}}
                                  @for($k = 1; $k < sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort); $k++)
                                    <tr>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['indikator']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n-2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+1']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+2']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+3']}}</td>
                                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['kondisi_akhir']}}</td>
                                    </tr>
                                  @endfor
                                @endfor
                              @endif
                            @endfor
                          @endif
                        @elseif($awalanMisiIndikator)
                          {{-- //untuk indikator misi selanjutnya --}}
                          @for($i = 1; $i < sizeof($misi->indikatorSort); $i++)
                            <tr>
                              <td></td>
                              <td></td>
                              <td>{{$misi->indikatorSort[$i]['indikator']}}</td>
                              <td>{{$misi->indikatorSort[$i]['n-2']}}</td>
                              <td>{{$misi->indikatorSort[$i]['n']}}</td>
                              <td>{{$misi->indikatorSort[$i]['n+1']}}</td>
                              <td>{{$misi->indikatorSort[$i]['n+2']}}</td>
                              <td>{{$misi->indikatorSort[$i]['n+3']}}</td>
                              <td>{{$misi->indikatorSort[$i]['kondisi_akhir']}}</td>
                            </tr>
                          @endfor

                          @for($i = 0; $i < sizeof($misi->tujuanSort); $i++)
                            <tr>
                              @php
                                $awalanTujuanIndikator = false;
                                $totalBaris = 1;
                                if( sizeof($misi->tujuanSort[$i]->sasaranSort) > 0){
                                  $totalBaris = sizeof($misi->tujuanSort[$i]->sasaranSort);                    
                                }
                                foreach ($misi->tujuanSort[$i]->sasaranSort as $setiapSasaran) {
                                  $totalBaris += sizeof($setiapSasaran->indikatorSort);
                                  if(sizeof($setiapSasaran->indikatorSort) > 0){
                                    $totalBaris--;
                                  }
                                }
                                if( sizeof($misi->tujuanSort[$i]->indikatorSort) > 0){
                                  $totalBaris += sizeof($misi->tujuanSort[$i]->indikatorSort);
                                  $awalanTujuanIndikator = true;
                                }
                              @endphp
                              <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[$i]['tujuan']}}</td>
                              <!-- Sasaran Nya -->
                              @if(sizeof($misi->tujuanSort[$i]->sasaranSort) > 0 && !$awalanTujuanIndikator)
                                @php
                                  $totalBaris = 1;
                                  if( sizeof($misi->tujuanSort[$i]->sasaranSort[0]->indikator) > 0){
                                    $totalBaris = sizeof($misi->tujuanSort[0]->sasaranSort[0]->indikator);
                                  }
                                @endphp
                                <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[$i]->sasaranSort[0]['sasaran']}}</td>
                                <!-- Indikator Nya -->
                                @if(sizeof($misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort) > 0)
                                  <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['indikator']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n-2']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n+1']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n+2']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['n+3']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->sasaranSort[0]->indikatorSort[0]['kondisi_akhir']}}</td>
                                @else
                                  <td>-</td>
                                @endif
                              @elseif($awalanTujuanIndikator)
                                <td></td>
                                <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['indikator']}}</td>
                                <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n-2']}}</td>
                                <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n']}}</td>
                                <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n+1']}}</td>
                                <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n+2']}}</td>
                                <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['n+3']}}</td>
                                <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['kondisi_akhir']}}</td>
                              @else
                                <td>-</td>
                                <td>-</td>
                              @endif
                            </tr>                      
                            @if(!$awalanTujuanIndikator)
                              @for($j = 1; $j < sizeof($misi->tujuanSort[$i]->sasaranSort); $j++)
                                @php
                                  $totalBaris = 1;
                                  if( sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort) > 0){
                                    $totalBaris = sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort);
                                  }
                                @endphp
                                <tr>
                                  <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[$i]->sasaranSort[$j]['sasaran']}}</td>
                                  @if(sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort) > 0)
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['indikator']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n-2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+1']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+3']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['kondisi_akhir']}}</td>
                                  @else
                                    <td>-</td>
                                  @endif
                                </tr>
                                {{-- SISA INDIKATORNTYA --}}
                                @for($k = 1; $k < sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort); $k++)
                                  <tr>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['indikator']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n-2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+1']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+3']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['kondisi_akhir']}}</td>
                                  </tr>
                                @endfor
                              @endfor
                            @else
                              {{-- //untuk indikator tujuan selanjutnya --}}
                              @for($j = 1; $j < sizeof($misi->tujuanSort[$i]->indikatorSort); $j++)
                                <tr>
                                  <td></td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['indikator']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n-2']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n+1']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n+2']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['n+3']}}</td>
                                  <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['kondisi_akhir']}}</td>
                                </tr>
                                {{-- @php dd($misi->tujuanSort[$i]->indikatorSort[$j]['indikator']) @endphp --}}
                              @endfor
                              {{-- //untuk sasaran selanjutnya --}}
                              @for($j = 0; $j < sizeof($misi->tujuanSort[$i]->sasaranSort); $j++)
                                @php
                                  $totalBaris = 1;
                                  if( sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort) > 0){
                                    $totalBaris = sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort);
                                  }
                                @endphp
                                <tr>
                                  <td rowspan="{{ $totalBaris }}">{{$misi->tujuanSort[$i]->sasaranSort[$j]['sasaran']}}</td>
                                  @if(sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort) > 0)
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['indikator']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n-2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+1']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['n+3']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[0]['kondisi_akhir']}}</td>
                                  @else
                                    <td>-</td>
                                  @endif
                                </tr>
                                {{-- SISA INDIKATORNTYA --}}
                                @for($k = 1; $k < sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort); $k++)
                                  <tr>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['indikator']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n-2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+1']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+2']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['n+3']}}</td>
                                    <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['kondisi_akhir']}}</td>
                                  </tr>
                                @endfor
                              @endfor
                            @endif
                          @endfor

                        @endif
                      @endforeach
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
    </header>

    <!-- Page Content -->


      

      <!-- Marketing Icons Section -->
      

    <footer class="py-5 bg-dark">
      <div class="container">
        <!-- <p class="m-0 text-center text-white">Copyright &copy; CFPLA Website 2018</p> -->
      </div>
    </footer>
  <script src="{{asset('js/app.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

  <script language="javascript" type="text/javascript">
  document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
  document.getElementById('contents').style.visibility="hidden";
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
         document.getElementById('contents').style.visibility="visible";
      },1000);
  }
}
</script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>
