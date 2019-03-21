@extends('kepaladaerah.layout.layout')

@section('content')
    <table class="table table-striped">
          <tbody>
            <tr>
              <td><h4>Input Visi dan Misi</h4></td>
            </tr>
             <tr>
                <td colspan="1">
                   <form class="well form-horizontal" method="post" action="{{ url('/kepaladaerah/storeVisiMisi') }}">
                    {{ csrf_field() }}
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-1 control-label">Visi</label>
                            <div class="col-md-11 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><input id="visi" name="visi" placeholder="Visi" class="form-control" required="true" value="" type="text"></div>
                            </div>
                         </div>
                         <div id="misi_div" >
                             
                         </div>
                         </div>  
                            <input type="button" id="btAdd" value="Tambah Misi" class="bt" />
                            <input type="button" id="btRemove" value="Hapus Misi Terahkir" class="bt" />
                            <input type="submit" value="simpan" name="simpan" style="float: right;" />
                      </fieldset>
                      
                   </form>
                </td>                
             </tr>
              <tr>
                
              </tr>
          </tbody>
       </table>
       <script type="text/javascript">
           $(document).ready(function() {

        var iCnt = 0;
        if (iCnt==0)
        {
            iCnt = iCnt + 1;
                $('#misi_div').append('<div class="form-group" id="'+iCnt+'"><label class="col-md-1 control-label">Misi '+iCnt+'</label><div class="col-md-11 inputGroupContainer"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><input type=text class="form-control" name="misi[]" required="true" value="" placeholder="Misi '+iCnt+'"/></div></div></div>');
        }
        
            $('#btAdd').click(function() {
                iCnt = iCnt + 1;
                $('#misi_div').append('<div class="form-group" id="'+iCnt+'"><label class="col-md-1 control-label">Misi '+iCnt+'</label><div class="col-md-11 inputGroupContainer"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><input type=text class="form-control" name="misi[]" required="true" value="" placeholder="Misi '+iCnt+'"/></div></div></div>');
        });
        
        $('#btRemove').click(function() {
            if (iCnt != 1) { $('#' + iCnt).remove(); iCnt = iCnt - 1; }
            else if (iCnt ==1)
            {
                alert("Tidak bisa menghapus, minimal misi harus 1");
            }            
        });
    });
       </script>
@endsection
