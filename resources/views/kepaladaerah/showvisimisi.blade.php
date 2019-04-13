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
                  <th>Visi</th>
                  <th>Misi</th>
                </tr>
                </thead>
                <tbody>
                @if($VisiMisi != null)
                  <tr>
                      <td rowspan="5">{{$VisiMisi['visi']}}</td>
                      <td>{{$VisiMisi->misi[0]['misi']}}</td>
                  </tr>
                  @for ($j = 1; $j < sizeof($VisiMisi->misi); $j++)
                    <tr><td>{{$VisiMisi->misi[$j]['misi']}}</td></tr>
                  @endfor
                @endif
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
