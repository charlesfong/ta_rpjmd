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
        @foreach($Misis as $misi)
          <div class="box-body">
            <table id="" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th colspan="3" style="text-align: center;"><h4>MISI : <b>{{$misi['misi']}}</b></h4></th>
                </tr>
                <tr>
                  <th>Tujuan</th>
                  <th>Ubah</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              <tbody>
                @foreach($misi->tujuanSort as $tujuanNya)
                  <tr>
                    <td>{{$tujuanNya['tujuan']}}</td>
                    <td style="width: 50px; text-align: center;">
                      <button type="button" data-toggle="modal" data-target="#modal-update" class="btn btn-primary btn-sm btn-editVisi" value="{{$tujuanNya['id']}}"><i class="fa fa-edit"></i></button>
                    </td>
                    <td style="width: 50px; text-align: center;">
                      <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete" value="{{$tujuanNya['id']}}"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                @endforeach
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
          <br>
        @endforeach
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->


<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script type="text/javascript">
    $(".btn-delete").click(function(e) {
      $("#frmDelete").attr("action",  "{{ route('deleteTujuan') }}");
      $("#btn-submit-delete").attr("value", $(this).val());
      $("#submit-delete").attr("value", "misi");
    });
    $(".btn-editMisi").click(function(e) {
      $("#cbo_visi").hide();
      fetchEdit($(this).val(), '{{ route('editMisi') }}', 'misi');
      $("#actionEdit").attr("action",  "{{ route('updateVisiMisi') }}");
      $("#btn-confirmUpdate").attr("value", $(this).val());
      $("#txtModalEdit").html("Edit Misi");
      $("#txtEdit").html("Misi");
      $("#idType").attr("value", "misi");
    });

    function fetchEdit(idNya, urlNya, type) {
      $.ajax({
          headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
          type: 'post',
          url: urlNya,
          data: {
              'id': idNya
          },
          success: function(data){
            $("#edit_content").html(data['result'][type]);
            if(type == 'misi'){
              $("#cbo_visi").show();
            }
          },
          error: function (data) {
            console.log(data.responseText);
          }
      });
    }
  </script>

@endsection