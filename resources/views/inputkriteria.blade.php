@extends('layouts.layout')

@section('content')
  @php
    if($TipeData == 'Misi'){
      $urlStore = route('storeKriteriaMisi');
      $urlEdit = route('editMisiKriteria');
      $urlUpdate = route('updateMisiKriteria');
      $urlDelete = route('deleteMisiKriteria');
    }
    else if($TipeData == 'Tujuan'){
      $urlStore = route('storeKriteriaTujuan');
      $urlEdit = route('editTujuanKriteria');
      $urlUpdate = route('updateTujuanKriteria');
      $urlDelete = route('deleteTujuanKriteria');
    }
    else if($TipeData == 'Sasaran'){
      $urlStore = route('storeKriteriaSasaran');
      $urlEdit = route('editSasaranKriteria');
      $urlUpdate = route('updateSasaranKriteria');
      $urlDelete = route('deleteSasaranKriteria');
    }
    else if($TipeData == 'Indikator'){
      $urlStore = route('storeKriteriaIndikator');
      $urlEdit = route('editIndikatorKriteria');
      $urlUpdate = route('updateIndikatorKriteria');
      $urlDelete = route('deleteIndikatorKriteria');
    }
  @endphp
    <table class="table table-striped">
          <tbody>
            <tr>
              <td><h4>Input Kriteria</h4></td>
            </tr>
             <tr>
                <td colspan="1">
                   <form class="well form-horizontal" method="post" action="{{ $urlStore }}">
                    {{ csrf_field() }}
                      <fieldset>
                         <div id="misi_div" >
                             <div class="form-group" id="kriteria">
                              <label class="col-md-1 control-label">Kriteria</label>
                              <div class="col-md-11 inputGroupContainer">
                                <div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                  <textarea type=text class="form-control" name="kriteria" required="true" value="" placeholder="Kriteria" style="width: 100%; resize: vertical;"></textarea>
                                </div>
                              </div>
                            </div>
                         </div> 
                            <input type="submit" value="simpan" name="simpan" style="float: right;" />
                      </fieldset>
                   </form>
                </td>                
             </tr>
              <tr>
                
              </tr>
          </tbody>
       </table>
       <table class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Kriteria</th>
        </tr>
        </thead>
        <tbody>
          @foreach($Kriteria as $key)
          <tr>
            <td>{{$key['id']}}</td> 
            <td>{{$key['kriteria']}}</td> 
            <td style="width: 50px; text-align: center;">
              <button type="button" data-toggle="modal" data-target="#modal-update" class="btn btn-primary btn-sm btn-edit" value="{{$key['id']}}"><i class="fa fa-edit"></i></button>
            </td>
            <td style="width: 50px; text-align: center;">
              <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete" value="{{$key['id']}}"><i class="fa fa-trash"></i></button>
            </td>
          </tr>
          @endforeach
        </tfoot>
      </table>
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
                          <div class="form-group">
                              <h4 id="txtEdit">-</h4>
                              <textarea id="edit_content" name="content" class="form-control form-control-sm" placeholder="Kriteria" required></textarea>
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
        {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <script type="text/javascript">
          $(".btn-delete").click(function(e) {
            $("#frmDelete").attr("action",  "{{ $urlDelete }}");
            $("#btn-submit-delete").attr("value", $(this).val());
            $("#submit-delete").attr("value", "{{$TipeData}}");
          });

          $(".btn-edit").click(function(e) {
            fetchEdit($(this).val(), '{{ $urlEdit }}');
            $("#actionEdit").attr("action",  "{{ $urlUpdate }}");
            $("#btn-confirmUpdate").attr("value", $(this).val());
            $("#txtModalEdit").html("Edit {{$TipeData}}");
            $("#txtEdit").html("{{$TipeData}}");
            $("#idType").attr("value", "{{$TipeData}}");

          });

          function fetchEdit(idNya, urlNya) {
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
                  $("#edit_content").html(data['result']['kriteria']);
                },
                error: function (data) {
                  console.log(data.responseText);
                }
            });
          }
        </script>
@endsection
