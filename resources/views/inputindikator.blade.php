@extends('layouts.layout')

@section('content')
	<table class="table table-striped">
          <tbody>
            <tr>
              <td><h4>Input Indikator</h4></td>
            </tr>
             <tr>
                <td colspan="1">
                   <form class="well form-horizontal" method="post" action="{{ route('storeIndikator') }}">
                    {{ csrf_field() }}
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-1 control-label">Pilih Visi</label>
                            <div class="col-md-11 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                               <select id="visi" name="visi" class="form-control">
                                <option value="" selected="selected" disabled="disabled">Pilih Visi</option> 
                               	@foreach ($VisiMisi as $obj)
                                  @php
                                    $namaVisi = str_split($obj['visi']);
                                    $resultNama = '';
                                    $jumlahSpace = 0;
                                    foreach($namaVisi as $name){
                                      $resultNama.=$name;
                                      if($name == ' '){
                                        $jumlahSpace++;
                                      }
                                      if($jumlahSpace >5){
                                        $jumlahSpace = 0;
                                        $resultNama.='/n';
                                      }
                                    }
                                  @endphp
                                 	<option value="{{$obj['id']}}">{!! '('.$obj['id'].') '.$resultNama !!}</option>
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
                               	<option value="" selected="selected" disabled="disabled">Pilih Misi</option> 
                               </select>
                               </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-1 control-label">Pilih Tujuan</label>
                            <div class="col-md-11 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                               <select id="tujuan" name="tujuan" class="form-control required">
                                <option value="" selected="selected" disabled="disabled">Pilih Tujuan</option> 
                               </select>
                               </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-1 control-label">Pilih Sasaran</label>
                            <div class="col-md-11 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                               <select id="sasaran" name="sasaran" class="form-control required">
                                <option value="" selected="selected" disabled="disabled">Pilih Sasaran</option> 
                               </select>
                               </div>
                            </div>
                         </div>
                         <div id="tujuan_div">
                            
                         </div>
                       </div>
                          <input type="button" id="btAdd" value="Tambah Indikator" class="bt" style="display: none;" />
                          <input type="button" id="btRemove" value="Hapus Indikator Terahkir" class="bt" style="display: none;"/>
                          <input type="submit" id="btsimpan" value="simpan" name="simpan" style="display: none;float: right;" />
                      </fieldset>
                      
                   </form>
                </td>                
             </tr>
              <tr>
                
              </tr>
          </tbody>
       </table>
       

       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
       <script type="text/javascript">
        var iCnt = 0;
        // $("#visi").change(function() {
        //     $("#tujuan_div").empty();
        //     $("#btAdd").show();
        //     $("#btRemove").show();
        //     $("#btsimpan").show();
        //     iCnt=0;
        //     // if (iCnt > 0) { $('#' + iCnt).remove(); iCnt =0; }
        //     if (iCnt==0)
        //     {
        //         iCnt = iCnt + 1;
        //             $('#tujuan_div').append('<div class="form-group" id="'+iCnt+'"><label class="col-md-1 control-label">Tujuan '+iCnt+'</label><div class="col-md-11 inputGroupContainer"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><input type=text class="form-control" name="tujuan[]" required="true" value="" placeholder="Tujuan '+iCnt+'"/></div></div></div>');
        //     }
        // });
        $("#sasaran, #tujuan, #misi").change(function() {
            console.log($('#misi').val());
            $("#tujuan_div").empty();
            $("#btAdd").show();
            $("#btRemove").show();
            $("#btsimpan").show();
            iCnt=0;
            // if (iCnt > 0) { $('#' + iCnt).remove(); iCnt =0; }
            if (iCnt==0)
            {
                iCnt = iCnt + 1;
                    $('#tujuan_div').append('<div class="form-group" id="'+iCnt+'"><label class="col-md-1 control-label">Indikator '+iCnt+'</label><div class="col-md-11 inputGroupContainer"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><input type=text class="form-control" name="indikator[]" required="true" value="" placeholder="Indikator '+iCnt+'"/><input type=text class="form-control" name="n-2[]" required="true" value="" placeholder="n-2 Indikator '+iCnt+'"/><input type=text class="form-control" name="n[]" required="true" value="" placeholder="n Indikator '+iCnt+'"/><input type=text class="form-control" name="n+1[]" required="true" value="" placeholder="n+1 Indikator '+iCnt+'"/><input type=text class="form-control" name="n+2[]" required="true" value="" placeholder="n+2 Indikator '+iCnt+'"/><input type=text class="form-control" name="n+3[]" required="true" value="" placeholder="n+3 Indikator '+iCnt+'"/><input type=text class="form-control" name="kondisi_akhir[]" required="true" value="" placeholder="Kondisi Akhir Indikator '+iCnt+'"/></div></div></div>');
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
                    $('#tujuan_div').append('<div class="form-group" id="'+iCnt+'"><label class="col-md-1 control-label">Indikator '+iCnt+'</label><div class="col-md-11 inputGroupContainer"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span><input type=text class="form-control" name="indikator[]" required="true" value="" placeholder="Indikator '+iCnt+'"/><input type=text class="form-control" name="n-2[]" required="true" value="" placeholder="n-2 Indikator '+iCnt+'"/><input type=text class="form-control" name="n[]" required="true" value="" placeholder="n Indikator '+iCnt+'"/><input type=text class="form-control" name="n+1[]" required="true" value="" placeholder="n+1 Indikator '+iCnt+'"/><input type=text class="form-control" name="n+2[]" required="true" value="" placeholder="n+2 Indikator '+iCnt+'"/><input type=text class="form-control" name="n+3[]" required="true" value="" placeholder="n+3 Indikator '+iCnt+'"/><input type=text class="form-control" name="kondisi_akhir[]" required="true" value="" placeholder="Kondisi Akhir Indikator '+iCnt+'"/></div></div></div>');
            });

        $("#visi").change(function (e) {
            var id = $(this).val();
            console.log(id);
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'get',
              url: "{{ route('showMisi') }}",
              data: {
                  'id': id
              },
              success: function (data) {
                  var misi = data['result'];
                  $("#misi").empty();
                  select = document.getElementById("misi");

                  var opt = document.createElement('option');
                  opt.setAttribute("name", "misi");
                  opt.value = "";
                  opt.innerHTML = "PILIH MISI";
                  select.appendChild(opt);

                  for(var i = 0; i < misi.length; i++){
                    var opt = document.createElement('option');
                    opt.setAttribute("name", "misi");
                    opt.value = misi[i]['id'];
                    opt.innerHTML = misi[i]['misi'];
                    select.appendChild(opt);
                  }
              },
          });
        });
        $("#misi").change(function (e) {
            var id = $(this).val();
            console.log(id);
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'get',
              url: "{{ route('showTujuan') }}",
              data: {
                  'id': id
              },
              success: function (data) {
                  var tujuan = data['result'];
                  $("#tujuan").empty();
                  select = document.getElementById("tujuan");

                  var opt = document.createElement('option');
                  opt.setAttribute("name", "tujuan");
                  opt.value = "";
                  opt.innerHTML = "PILIH TUJUAN";
                  select.appendChild(opt);

                  for(var i = 0; i < tujuan.length; i++){
                    var opt = document.createElement('option');
                    opt.setAttribute("name", "tujuan");
                    opt.value = tujuan[i]['id'];
                    opt.innerHTML = tujuan[i]['tujuan'];
                    select.appendChild(opt);
                  }
              },
          });
        });
        $("#tujuan").change(function (e) {
            var id = $(this).val();
            console.log(id);
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: 'get',
              url: "{{ route('showSasaran') }}",
              data: {
                  'id': id
              },
              success: function (data) {
                  var sasaran = data['result'];
                  $("#sasaran").empty();
                  select = document.getElementById("sasaran");

                  var opt = document.createElement('option');
                  opt.setAttribute("name", "sasaran");
                  opt.value = "";
                  opt.innerHTML = "PILIH SASARAN";
                  select.appendChild(opt);

                  for(var i = 0; i < tujuan.length; i++){
                    var opt = document.createElement('option');
                    opt.setAttribute("name", "sasaran");
                    opt.value = sasaran[i]['id'];
                    opt.innerHTML = sasaran[i]['sasaran'];
                    select.appendChild(opt);
                  }
              },
          });
        });
       </script>
@endsection
