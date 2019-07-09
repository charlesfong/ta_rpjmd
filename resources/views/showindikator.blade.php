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
								<th colspan="8" style="text-align: center;"><h4>MISI : <b>{{$misi['misi']}}</b></h4></th>
							</tr>
							@if(sizeof($misi->indikatorSort) > 0)
								<tr>
									<th>Indikator</th>
									<th>(n-2)</th>
									<th>(n)</th>
									<th>(n+1)</th>
									<th>(n+2)</th>
									<th>(n+3)</th>
									<th>Kondisi Akhir</th>
									<th>Ubah</th>
									<th>Hapus</th>
								</tr>
							@endif
						</thead>
						@if(sizeof($misi->indikatorSort) > 0)
							<tbody>
								@foreach($misi->indikatorSort as $indikatorNya)
								<tr>
									<td>{{$indikatorNya['indikator']}}</td>
									<td>{{$indikatorNya['n-2']}}</td>
									<td>{{$indikatorNya['n']}}</td>
									<td>{{$indikatorNya['n+1']}}</td>
									<td>{{$indikatorNya['n+2']}}</td>
									<td>{{$indikatorNya['n+3']}}</td>
									<td>{{$indikatorNya['kondisi_akhir']}}</td>
									<td style="width: 50px; text-align: center;">
										<button type="button" data-toggle="modal" data-target="#modal-update" class="btn btn-primary btn-sm btn-edit" value="{{$indikatorNya['id']}}"><i class="fa fa-edit"></i></button>
									</td>
									<td style="width: 50px; text-align: center;">
										<button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete" value="{{$indikatorNya['id']}}"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
								@endforeach
							</tbody>
						@endif

						@foreach($misi->tujuanSort as $tujuanNya)
							<thead>
								<tr>
									<th colspan="8" style="text-align: center;"><h4>TUJUAN : <b>{{$tujuanNya['tujuan']}}</b></h4></th>
								</tr>
								@if(sizeof($tujuanNya->indikatorSort) > 0)
									<tr>
										<th>Indikator</th>
										<th>(n-2)</th>
										<th>(n)</th>
										<th>(n+1)</th>
										<th>(n+2)</th>
										<th>(n+3)</th>
										<th>Kondisi Akhir</th>
										<th>Ubah</th>
										<th>Hapus</th>
									</tr>
								@endif
							</thead>
							@if(sizeof($tujuanNya->indikatorSort) > 0)
								<tbody>
									@foreach($tujuanNya->indikatorSort as $indikatorNya)
									<tr>
										<td>{{$indikatorNya['indikator']}}</td>
										<td>{{$indikatorNya['n-2']}}</td>
										<td>{{$indikatorNya['n']}}</td>
										<td>{{$indikatorNya['n+1']}}</td>
										<td>{{$indikatorNya['n+2']}}</td>
										<td>{{$indikatorNya['n+3']}}</td>
										<td>{{$indikatorNya['kondisi_akhir']}}</td>
										<td style="width: 50px; text-align: center;">
											<button type="button" data-toggle="modal" data-target="#modal-update" class="btn btn-primary btn-sm btn-edit" value="{{$indikatorNya['id']}}"><i class="fa fa-edit"></i></button>
										</td>
										<td style="width: 50px; text-align: center;">
											<button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete" value="{{$indikatorNya['id']}}"><i class="fa fa-trash"></i></button>
										</td>
									</tr>
									@endforeach
								</tbody>
							@endif

							@foreach($tujuanNya->sasaranSort as $sasaranNya)
							<thead>
								<tr>
									<th colspan="8" style="text-align: center;"><h4>SASARAN : <b>{{$sasaranNya['sasaran']}}</b></h4></th>
								</tr>
								<tr>
									<th>Indikator</th>
									<th>(n-2)</th>
									<th>(n)</th>
									<th>(n+1)</th>
									<th>(n+2)</th>
									<th>(n+3)</th>
									<th>Kondisi Akhir</th>
									<th>Ubah</th>
									<th>Hapus</th>
								</tr>
							</thead>
							<tbody>
								@foreach($sasaranNya->indikatorSort as $indikatorNya)
								<tr>
									<td>{{$indikatorNya['indikator']}}</td>
									<td>{{$indikatorNya['n-2']}}</td>
									<td>{{$indikatorNya['n']}}</td>
									<td>{{$indikatorNya['n+1']}}</td>
									<td>{{$indikatorNya['n+2']}}</td>
									<td>{{$indikatorNya['n+3']}}</td>
									<td>{{$indikatorNya['kondisi_akhir']}}</td>
									<td style="width: 50px; text-align: center;">
										<button type="button" data-toggle="modal" data-target="#modal-update" class="btn btn-primary btn-sm btn-edit" value="{{$indikatorNya['id']}}"><i class="fa fa-edit"></i></button>
									</td>
									<td style="width: 50px; text-align: center;">
										<button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-sm btn-delete" value="{{$indikatorNya['id']}}"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
								@endforeach
							</tfoot>
							@endforeach
						@endforeach
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
                    <div class="form-group" id="cbo_misi">
                        <span>TUJUAN</span> 
                        <select id="edit-tujuan" style="margin-top: 0.5em;" class="form-control" style="height: auto;" name="tujuan" required>
                          <option selected="" value="" disabled="">Pilih Tujuan</option>
                        </select>
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="form-group" id="cbo_misi">
                        <span>SASARAN</span> 
                        <select id="edit-sasaran" style="margin-top: 0.5em;" class="form-control" style="height: auto;" name="sasaran" required>
                          <option selected="" value="" disabled="">Pilih Sasaran</option>
                        </select>
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <h4 id="txtEdit">-</h4>
                        <textarea id="edit_indikator" name="indikator" class="form-control form-control-sm" required></textarea>
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <h4 id="txtEdit">(n-2)</h4>
                        <input id="edit_n-2" name="n-2" class="form-control form-control-sm" required>
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <h4 id="txtEdit">(n)</h4>
                        <input id="edit_n" name="n" class="form-control form-control-sm" required>
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <h4 id="txtEdit">(n+1)</h4>
                        <input id="edit_n1" name="n+1" class="form-control form-control-sm" required>
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <h4 id="txtEdit">(n+2)</h4>
                        <input id="edit_n2" name="n+2" class="form-control form-control-sm" required>
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <h4 id="txtEdit">(n+3)</h4>
                        <input id="edit_n3" name="n+3" class="form-control form-control-sm" required>
                        <span class="invalid-feedback">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="form-group">
                        <h4 id="txtEdit">Kondisi Akhir</h4>
                        <input id="edit_kondisi_akhir" name="kondisi_akhir" class="form-control form-control-sm" required>
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
      $("#frmDelete").attr("action",  "{{ route('deleteIndikator') }}");
      $("#btn-submit-delete").attr("value", $(this).val());
      $("#submit-delete").attr("value", "indikator");
    });
    $(".btn-edit").click(function(e) {
      fetchEdit($(this).val(), '{{ route('editIndikator') }}', 'indikator');
      $("#actionEdit").attr("action",  "{{ route('updateIndikator') }}");
      $("#btn-confirmUpdate").attr("value", $(this).val());
      $("#txtModalEdit").html("Edit Indikator");
      $("#txtEdit").html("Indikator");
      $("#idType").attr("value", "indikator");
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
            console.log(data);
            $("#edit_indikator").html(data['result'][0][type]);
            $("#edit_n-2").val(data['result'][0]['n-2']);
            $("#edit_n").val(data['result'][0]['n']);
            $("#edit_n1").val(data['result'][0]['n+1']);
            $("#edit_n2").val(data['result'][0]['n+2']);
            $("#edit_n3").val(data['result'][0]['n+3']);
            $("#edit_kondisi_akhir").val(data['result'][0]['kondisi_akhir']);
            $("#edit-misi").val(data['result'][0]['misi_id']);
            fetchTujuan(data['result'][0]['misi_id'], data['result'][0]['tujuan_id'], data['result'][0]['sasaran_id']);
          },
          error: function (data) {
            console.log(data.responseText);
          }
      });
    }

    function fetchTujuan(idNya, idTujuanNya, idSasaranNya){
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'get',
        url: "{{ route('showTujuan') }}",
        data: {
            'id': idNya
        },
        success: function (data) {
            var tujuan = data['result'];
            $("#edit-tujuan").empty();
            select = document.getElementById("edit-tujuan");

            var opt = document.createElement('option');
            opt.setAttribute("name", "tujuan");
            opt.setAttribute("disabled", "");
            opt.setAttribute("selected", "");
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
            $("#edit-tujuan").val(idTujuanNya);
            fetchSasaran(idTujuanNya, idSasaranNya);
          },
      });
    }
    function fetchSasaran(idNya, idSasaranNya){
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'get',
        url: "{{ route('showSasaran') }}",
        data: {
            'id': idNya
        },
        success: function (data) {
            var sasaran = data['result'];
            $("#edit-sasaran").empty();
            select = document.getElementById("edit-sasaran");

            var opt = document.createElement('option');
            opt.setAttribute("name", "sasaran");
            opt.setAttribute("disabled", "");
            opt.setAttribute("selected", "");
            opt.value = "";
            opt.innerHTML = "PILIH SASARAN";
            select.appendChild(opt);

            for(var i = 0; i < sasaran.length; i++){
              var opt = document.createElement('option');
              opt.setAttribute("name", "sasaran");
              opt.value = sasaran[i]['id'];
              opt.innerHTML = sasaran[i]['sasaran'];
              select.appendChild(opt);
            }
            if(idSasaranNya != null){
	            $("#edit-sasaran").val(idSasaranNya);
	        }
        },
      });
    }
  </script>

@endsection