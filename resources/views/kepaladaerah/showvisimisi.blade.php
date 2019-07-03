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
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th colspan="3" style="text-align: center;"><h3>VISI</h3></th>
                </tr>
                <tr>
                  <th>Visi</th>
                  <th>Ubah</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                @if($VisiMisi != null)
                  <tr>
                    <td>{{$VisiMisi['visi']}}</td>
                    <td style="width: 50px; text-align: center;">
                      <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-primary btn-sm btn-editProduct" value="{{$VisiMisi['id']}}"><i class="fa fa-edit"></i></button>
                    </td>
                    <td style="width: 50px; text-align: center;">
                      <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete-visi" value="{{$VisiMisi['id']}}"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                @endif
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->

            <br>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th colspan="3" style="text-align: center;"><h3>MISI</h3></th>
                </tr>
                <tr>
                  <th>Misi</th>
                  <th>Ubah</th>
                  <th>Hapus</th>
                </tr>
                </thead>
                <tbody>
                @if($VisiMisi != null)
                  @foreach($VisiMisi->misiSort as $misiNya)
                  <tr>
                    <td>{{$misiNya['misi']}}</td>
                    <td style="width: 50px; text-align: center;">
                      <button type="button" data-toggle="modal" data-target="#modal-update" class="btn btn-primary btn-sm btn-edit" value="{{$misiNya['id']}}"><i class="fa fa-edit"></i></button>
                    </td>
                    <td style="width: 50px; text-align: center;">
                      <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete-misi" value="{{$misiNya['id']}}"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  @endforeach
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(".btn-delete-misi").click(function(e) {
        console.log('asada');
        $("#frmDelete").attr("action",  "{{ route('deleteVisiMisi') }}");
        $("#btn-submit-delete").attr("value", $(this).val());
        $("#submit-delete").attr("value", "misi");
      });

      $(".btn-delete-visi").click(function(e) {
        console.log('asada');
        $("#frmDelete").attr("action",  "{{ route('deleteVisiMisi') }}");
        $("#btn-submit-delete").attr("value", $(this).val());
        $("#submit-delete").attr("value", "visi");
      });
    </script>
@endsection
