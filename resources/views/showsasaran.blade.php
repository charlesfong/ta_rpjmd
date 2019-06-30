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
                  }
                @endphp 
                <tr>
                  <td rowspan="{{$totalBaris}}">{{$misi['misi']}}</td>
                  @if(sizeof($misi->tujuanSort) > 0)
                    @php
                      $totalBaris = 1;
                      if( sizeof($misi->tujuanSort[0]->sasaran) > 0){
                        $totalBaris = sizeof($misi->tujuanSort[0]->sasaran);
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
                @for($i = 1; $i < sizeof($misi->tujuanSort); $i++)
                  <tr>
                    <td>{{$misi->tujuanSort[$i]['tujuan']}}</td>
                  </tr>
                @endfor
                <tr>
                  <td></td>
                  <td>123</td>
                </tr>
                <tr>
                  <td>123</td>
                </tr>
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