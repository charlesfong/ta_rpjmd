@extends('layouts.layout')

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
            </tr>
            </thead>
            <tbody>
              @foreach($Misis as $misi)
                @php
                  $totalBaris = 1;
                  if( sizeof($misi->tujuanSort) > 0){
                    $totalBaris = sizeof($misi->tujuanSort);                    
                  }
                  foreach ($misi->tujuanSort as $setiapTujuan) {
                    $totalBaris += sizeof($setiapTujuan->sasaranSort);

                    // indikator punya
                    $totalBaris += sizeof($setiapTujuan->indikatorSort);
                    foreach ($setiapTujuan->sasaranSort as $setiapSasaran){
                      $totalBaris += sizeof($setiapSasaran->indikatorSort);
                      if(sizeof($setiapSasaran->indikatorSort) > 0){
                        $totalBaris--;
                      }
                    }
                  }
                  if( sizeof($misi->indikatorSort) > 0){
                    $totalBaris += sizeof($misi->indikatorSort);
                  }
                @endphp 
                <tr>
                  <td rowspan="{{$totalBaris}}">{{$misi['misi']}}</td>
                  @if(sizeof($misi->tujuanSort) > 0)
                    @php
                      $totalBaris = 1;
                      if( sizeof($misi->tujuanSort[0]->sasaranSort) > 0){
                        $totalBaris = sizeof($misi->tujuanSort[0]->sasaranSort);
                      }
                    @endphp
                    <td rowspan="{{$totalBaris}}">{{$misi->tujuanSort[0]['tujuan']}}</td>
                    @if(sizeof($misi->tujuanSort[0]->sasaran) > 0)
                      <td>{{$misi->tujuanSort[0]->sasaran[0]['sasaran']}}</td>
                    @else
                      <td>-</td>
                    @endif
                  @else
                    <td>-</td>
                  @endif
                </tr>
                {{-- //untuk sasaran selanjutnya --}}
                @for($i = 1; $i < sizeof($misi->tujuanSort[0]->sasaranSort); $i++)
                  <tr>
                    <td>{{$misi->tujuanSort[0]->sasaranSort[$i]['sasaran']}}</td>
                  </tr>
                @endfor
                {{-- //untuk tujuan selanjutnya --}}
                @for($i = 1; $i < sizeof($misi->tujuanSort); $i++)
                  <tr>
                    @php
                      $totalBaris = 1;
                      if( sizeof($misi->tujuanSort[$i]->sasaranSort) > 0){
                        $totalBaris = sizeof($misi->tujuanSort[$i]->sasaranSort);
                      }
                    @endphp
                    <td rowspan="{{$totalBaris}}">{{$misi->tujuanSort[$i]['tujuan']}}</td>
                    @if(sizeof($misi->tujuanSort[$i]->sasaran) > 0)
                      <td>{{$misi->tujuanSort[$i]->sasaran[0]['sasaran']}}</td>
                    @else
                      <td>-</td>
                    @endif
                  </tr>

                  {{-- //untuk sasaran selanjutnya --}}
                  @for($j = 1; $j < sizeof($misi->tujuanSort[$i]->sasaranSort); $j++)
                    <tr>
                      <td>{{$misi->tujuanSort[$i]->sasaranSort[$j]['sasaran']}}</td>
                    </tr>
                  @endfor
                @endfor
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