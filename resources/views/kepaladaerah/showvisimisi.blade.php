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
                      <button type="button" data-toggle="modal" data-target="#modal-update" class="btn btn-primary btn-sm btn-editVisi" value="{{$VisiMisi['id']}}"><i class="fa fa-edit"></i></button>
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
                      <button type="button" data-toggle="modal" data-target="#modal-update" class="btn btn-primary btn-sm btn-editMisi" value="{{$misiNya['id']}}"><i class="fa fa-edit"></i></button>
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
                            <select id="edit-preorder" style="margin-top: 0.5em;" class="form-control" style="height: auto;" name="visi" value="{{$VisiMisi['id']}}" required>
                                    <option selected="" value="{{$VisiMisi['id']}}">{{$VisiMisi['visi']}}</option>
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
      $(".btn-delete-misi").click(function(e) {
        $("#frmDelete").attr("action",  "{{ route('deleteVisiMisi') }}");
        $("#btn-submit-delete").attr("value", $(this).val());
        $("#submit-delete").attr("value", "misi");
      });

      $(".btn-delete-visi").click(function(e) {
        $("#frmDelete").attr("action",  "{{ route('deleteVisiMisi') }}");
        $("#btn-submit-delete").attr("value", $(this).val());
        $("#submit-delete").attr("value", "visi");
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

      $(".btn-editVisi").click(function(e) {
        $("#cbo_visi").hide();
        fetchEdit($(this).val(), '{{ route('editVisi') }}', 'visi')
        $("#actionEdit").attr("action",  "{{ route('updateVisiMisi') }}");
        $("#btn-confirmUpdate").attr("value", $(this).val());
        $("#txtModalEdit").html("Edit Visi");
        $("#txtEdit").html("Visi");
        $("#idType").attr("value", "visi");

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
