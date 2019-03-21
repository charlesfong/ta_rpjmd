@extends('kepaladaerah.layout.layout')

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
                  <th>No</th>
                  <th>id</th>
                  <th>Visi</th>
                  <th>Misi</th>
                </tr>
                </thead>
                <tbody>
            @foreach ($datavisimisi as $index => $data)
            <tr>
                <td>
                {{$index+1}}
                </td>
                <td>
                {{$data->id_visi}}
                </td>
                <td>
                {{$data->visi}}
                </td>
                <td>
                {{$data->misi}}
                </td> 
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
