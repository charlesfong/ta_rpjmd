@extends('layouts.layout')

@section('content')
  @php
    if($TipeData == 'Misi'){
      $urlStore = route('storeKriteriaMisi');
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
          </tr>
          @endforeach
        </tfoot>
      </table>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
       <script>
     $(document).ready(function() {

        // var iCnt = 0;
        // if (iCnt==0)
        // {
        //     iCnt = iCnt + 1;
        //         $('#misi_div').append('<div class="form-group" id="'+iCnt+'"><label class="col-md-1 control-label">Kriteria '+iCnt+'</label><div class="col-md-11 inputGroupContainer"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><textarea type=text class="form-control" name="kriteria[]" required="true" value="" placeholder="Kriteria '+iCnt+'" style="width: 100%; resize: vertical;"></textarea></div></div></div>');
        // }
        
        // $('#btAdd').click(function() {
        //     iCnt = iCnt + 1;
        //     $('#misi_div').append('<div class="form-group" id="'+iCnt+'"><label class="col-md-1 control-label">Kriteria '+iCnt+'</label><div class="col-md-11 inputGroupContainer"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><textarea type=text class="form-control" name="kriteria[]" required="true" value="" placeholder="Kriteria '+iCnt+'" style="width: 100%; resize: vertical;"></textarea></div></div></div>');
        // });
        
        // $('#btRemove').click(function() {
        //     if (iCnt != 1) { $('#' + iCnt).remove(); iCnt = iCnt - 1; }
        //     else if (iCnt ==1)
        //     {
        //         alert("Tidak bisa menghapus, minimal kriteria harus 1");
        //     }            
        // });
    });
       </script>
@endsection
