@section('content')

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
            <thead>
            <tr>
              <th>Misi</th>
              <th>Tujuan</th>
              <th>Sasaran</th>
              <th>Indikator</th>
            </tr>
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
                      @else
                        <td>-</td>
                      @endif
                    @elseif($awalanTujuanIndikator)
                      <td></td>
                      <td>{{$misi->tujuanSort[0]->indikatorSort[0]['indikator']}}</td>
                    @else
                      <td>-</td>
                      <td>-</td>
                    @endif
                  @elseif($awalanMisiIndikator)
                    <td></td>
                    <td></td>
                    <td>{{$misi->indikatorSort[0]['indikator']}}</td>
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
                        @else
                          <td>-</td>
                        @endif
                      </tr>
                      {{-- SISA INDIKATORNTYA --}}
                      @for($j = 1; $j < sizeof($misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort); $j++)
                        <tr>
                          <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['indikator']}}</td>
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
                          @else
                            <td>-</td>
                          @endif
                        @elseif($awalanTujuanIndikator)
                          <td></td>
                          <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['indikator']}}</td>
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
                            @else
                              <td>-</td>
                            @endif
                          </tr>
                          {{-- SISA INDIKATORNTYA --}}
                          @for($k = 1; $k < sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort); $k++)
                            <tr>
                              <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['indikator']}}</td>
                            </tr>
                          @endfor
                        @endfor
                      @else
                        {{-- //untuk indikator tujuan selanjutnya --}}
                        @for($j = 1; $j < sizeof($misi->tujuanSort[$i]->indikatorSort); $j++)
                          <tr>
                            <td></td>
                            <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['indikator']}}</td>
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
                            @else
                              <td>-</td>
                            @endif
                          </tr>
                          {{-- SISA INDIKATORNTYA --}}
                          @for($k = 1; $k < sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort); $k++)
                            <tr>
                              <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['indikator']}}</td>
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
                        @else
                          <td>-</td>
                        @endif
                      </tr>
                      {{-- SISA INDIKATORNTYA --}}
                      @for($j = 1; $j < sizeof($misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort); $j++)
                        <tr>
                          <td>{{$misi->tujuanSort[0]->sasaranSort[$i]->indikatorSort[$j]['indikator']}}</td>
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
                          @else
                            <td>-</td>
                          @endif
                        @elseif($awalanTujuanIndikator)
                          <td></td>
                          <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['indikator']}}</td>
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
                            @else
                              <td>-</td>
                            @endif
                          </tr>
                          {{-- SISA INDIKATORNTYA --}}
                          @for($k = 1; $k < sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort); $k++)
                            <tr>
                              <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['indikator']}}</td>
                            </tr>
                          @endfor
                        @endfor
                      @else
                        {{-- //untuk indikator tujuan selanjutnya --}}
                        @for($j = 1; $j < sizeof($misi->tujuanSort[$i]->indikatorSort); $j++)
                          <tr>
                            <td></td>
                            <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['indikator']}}</td>
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
                            @else
                              <td>-</td>
                            @endif
                          </tr>
                          {{-- SISA INDIKATORNTYA --}}
                          @for($k = 1; $k < sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort); $k++)
                            <tr>
                              <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['indikator']}}</td>
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
                        @else
                          <td>-</td>
                        @endif
                      @elseif($awalanTujuanIndikator)
                        <td></td>
                        <td>{{$misi->tujuanSort[$i]->indikatorSort[0]['indikator']}}</td>
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
                          @else
                            <td>-</td>
                          @endif
                        </tr>
                        {{-- SISA INDIKATORNTYA --}}
                        @for($k = 1; $k < sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort); $k++)
                          <tr>
                            <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['indikator']}}</td>
                          </tr>
                        @endfor
                      @endfor
                    @else
                      {{-- //untuk indikator tujuan selanjutnya --}}
                      @for($j = 1; $j < sizeof($misi->tujuanSort[$i]->indikatorSort); $j++)
                        <tr>
                          <td></td>
                          <td>{{$misi->tujuanSort[$i]->indikatorSort[$j]['indikator']}}</td>
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
                          @else
                            <td>-</td>
                          @endif
                        </tr>
                        {{-- SISA INDIKATORNTYA --}}
                        @for($k = 1; $k < sizeof($misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort); $k++)
                          <tr>
                            <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]->indikatorSort[$k]['indikator']}}</td>
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

@endsection