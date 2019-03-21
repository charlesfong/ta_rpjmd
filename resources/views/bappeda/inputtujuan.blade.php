@extends('bappeda.layout.layout')

@section('content')
	<table class="table table-striped">
          <tbody>
            <tr>
              <td><h4>Input Tujuan</h4></td>
            </tr>
             <tr>
                <td colspan="1">
                   <form class="well form-horizontal" method="post" action="{{ url('/bappeda/storeTujuan') }}">
                    {{ csrf_field() }}
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-1 control-label">Pilih Visi</label>
                            <div class="col-md-11 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                               <select id="visi" name="visi" class="form-control">
                               	@foreach ($dataVisi as $obj)
                               	<option value="{{$obj['id']}}">{{'('.$obj['id'].') '.$obj['isi_visi']}}</option>
                               	@endforeach
                               </select>
                               </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-1 control-label">Pilih Misi</label>
                            <div class="col-md-11 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                               <select id="misi" name="misi" class="form-control required">
                               	
                               </select>
                               </div>
                            </div>
                         </div>
                         <div id="tujuan_div">
                            
                         </div>
                       </div>
                          <input type="button" id="btAdd" value="Tambah Tujuan" class="bt" style="display: none;" />
                          <input type="button" id="btRemove" value="Hapus Tujuan Terahkir" class="bt" style="display: none;"/>
                          <input type="submit" id="btsimpan" value="simpan" name="simpan" style="display: none;float: right;" />
                      </fieldset>
                      
                   </form>
                </td>                
             </tr>
              <tr>
                
              </tr>
          </tbody>
       </table>
       

       <script type="text/javascript">
        var iCnt = 0;
    $("#visi").change(function() {
        $("#tujuan_div").empty();
        $("#btAdd").show();
        $("#btRemove").show();
        $("#btsimpan").show();
        iCnt=0;
        // if (iCnt > 0) { $('#' + iCnt).remove(); iCnt =0; }
        if (iCnt==0)
        {
            iCnt = iCnt + 1;
                $('#tujuan_div').append('<div class="form-group" id="'+iCnt+'"><label class="col-md-1 control-label">Tujuan '+iCnt+'</label><div class="col-md-11 inputGroupContainer"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><input type=text class="form-control" name="tujuan[]" required="true" value="" placeholder="Tujuan '+iCnt+'"/></div></div></div>');
        }
    });
    $("#misi").change(function() {
        console.log($('#misi').val());
        $("#tujuan_div").empty();
        $("#btAdd").show();
        $("#btRemove").show();
        iCnt=0;
        // if (iCnt > 0) { $('#' + iCnt).remove(); iCnt =0; }
        if (iCnt==0)
        {
            iCnt = iCnt + 1;
                $('#tujuan_div').append('<div class="form-group" id="'+iCnt+'"><label class="col-md-1 control-label">Tujuan '+iCnt+'</label><div class="col-md-11 inputGroupContainer"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><input type=text class="form-control" name="tujuan[]" required="true" value="" placeholder="Tujuan '+iCnt+'"/></div></div></div>');
        }
    });
    $('#btRemove').click(function() {
            if (iCnt != 1) { $('#' + iCnt).remove(); iCnt = iCnt - 1; }
            else if (iCnt ==1)
            {
                alert("Tidak bisa menghapus, minimal tujuan harus 1");
            }            
        });
    $('#btAdd').click(function() {
                console.log(iCnt);
                iCnt = iCnt + 1;
                $('#tujuan_div').append('<div class="form-group" id="'+iCnt+'"><label class="col-md-1 control-label">Tujuan '+iCnt+'</label><div class="col-md-11 inputGroupContainer"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><input type=text class="form-control" name="tujuan[]" required="true" value="" placeholder="Tujuan '+iCnt+'"/></div></div></div>');
        });

    $("#visi").change(function (e) {
        var id = $(this).val();
        $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'get',
          url: "{{route('readDataMisiDraft')}}",
          data: {
              'id': id
          },
          success: function (data) {
              $("#misi").empty();
              select = document.getElementById("misi");
              var misi = <?php echo json_encode($datamisi); ?>;
              for(var i = 0; i < misi.length; i++){
                if(misi[i]['id_visi'] == id){
                  var opt = document.createElement('option');
                  opt.setAttribute("name", "misi");
                  opt.value = misi[i]['id'];
                  opt.innerHTML = misi[i]['isi_misi'];
                  select.appendChild(opt);
                }
              }


          },
      });
    });
       </script>
@endsection
