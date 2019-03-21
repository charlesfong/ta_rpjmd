@extends('admin.layout.layout')
@section('content')
      
       <table class="table table-striped">

          <tbody>
            <tr>
              <td><h4>Tambah User</h4></td>
            </tr>
             <tr>
                <td colspan="1">
                   <form class="well form-horizontal" method="post" action="{{ url('/admin/storeUser') }}">
                    
                    {{ csrf_field() }}
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-1 control-label">Username</label>
                            <div class="col-md-11 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="username" name="username" placeholder="Username" class="form-control" required="true" value="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-1 control-label">Full Name</label>
                            <div class="col-md-11 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="full_name" name="full_name" placeholder="Nama Lengkap" class="form-control" required="true" value="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-1 control-label">Kategori</label>
                            <div class="col-md-11 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><select name="category" id="category" class="form-control">
                              <option disabled selected value> -- Kategori User -- </option>
                              <option value="kepala daerah">Kepala Daerah</option>
                              <option value="bappeda">Bappeda</option>
                              <option value="kepala opd">Kepala OPD</option>
                              <option value="opd">OPD</option>
                              <option value="tim ahli">Tim Ahli</option>
                              <option value="admin">Admin</option>
                            </select></div>
                            </div>
                         </div>
                         
                      </fieldset>
                      
                        <input type="submit" value="simpan" name="simpan" style="float: right;" />
                      
                   </form>
                </td>                
             </tr>
              <tr>
                
              </tr>
          </tbody>
       </table>
@endsection