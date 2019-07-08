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
                      <button type="button" data-toggle="modal" data-target="#modal-update" class="btn btn-primary btn-sm btn-edit" value="{{$tujuanNya['id']}}"><i class="fa fa-edit"></i></button>
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

{{-- MODAL UPDATE --}}
<div class="modal fade" role="dialog" tabindex="-1" id="modal-update" style="">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="txtModalEdit" class="text-center">Edit </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- FORM UNTUK UPDATE DATA -->
            <form id="actionEdit" method="post" action="">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input id="idType" type="hidden" name="type" value="">
                    <div class="form-group" id="cbo_visi">
                        <span>VISI</span> 
                        <select id="edit-visi" style="margin-top: 0.5em;" class="form-control" style="height: auto;" name="visi" value="{{$Misis[0]->visi[0]['id']}}" required>
                          <option selected="" value="{{$Misis[0]->visi['id']}}">{{$Misis[0]->visi['visi']}}</option>
                        </select>
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="form-group" id="cbo_misi">
                        <span>MISI</span> 
                        <select id="edit-misi" style="margin-top: 0.5em;" class="form-control" style="height: auto;" name="misi" required>
                          @foreach($Misis as $misi)
                            <option selected="" value="{{$misi['id']}}">{{$misi['misi']}}</option>
                          @endforeach
                        </select>
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <h4 id="txtEdit">-</h4>
                        <textarea id="edit_content" name="content" class="form-control form-control-sm" required></textarea>
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" id="tesbtn">Debug</button> -->
                    <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" id="btn-confirmUpdate" name="id" value="-">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script type="text/javascript">
    $(".btn-delete").click(function(e) {
      $("#frmDelete").attr("action",  "{{ route('deleteTujuan') }}");
      $("#btn-submit-delete").attr("value", $(this).val());
      $("#submit-delete").attr("value", "misi");
    });
    $(".btn-edit").click(function(e) {
      fetchEdit($(this).val(), '{{ route('editTujuan') }}', 'tujuan');
      $("#actionEdit").attr("action",  "{{ route('updateTujuan') }}");
      $("#btn-confirmUpdate").attr("value", $(this).val());
      $("#txtModalEdit").html("Edit Tujuan");
      $("#txtEdit").html("Tujuan");
      $("#idType").attr("value", "tujuan");
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
            $("#edit-misi").val(data['result']['misi_id']);
          },
          error: function (data) {
            console.log(data.responseText);
          }
      });
    }
  </script>

@endsection