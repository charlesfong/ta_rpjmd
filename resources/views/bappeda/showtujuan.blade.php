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
                  if( sizeof($misi->tujuan) > 0){
                    $totalBaris = sizeof($misi->tujuan);                    
                  }
                @endphp
                <tr>
                  <td rowspan="{{$totalBaris}}">{{$misi['misi']}}</td>
                  @if(sizeof($misi->tujuan) > 0)
                    <td>{{$misi->tujuan[0]['tujuan']}}</td>
                  @else
                    <td>-</td>
                  @endif
                </tr>
                @for($i = 1; $i < sizeof($misi->tujuan); $i++)
                  <tr>
                    <td>{{$misi->tujuan[$i]['tujuan']}}</td>
                  </tr>
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