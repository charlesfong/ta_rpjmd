@extends('layouts.layout')
@section('content')
      
       <table class="table table-striped">

          <tbody>
            <tr>
              <td><h4>Tambah User</h4></td>
            </tr>
             <tr>
                <td colspan="1">
                   <form class="well form-horizontal" method="post" action="{{ route('storeUser') }}">
                    
                    {{ csrf_field() }}
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-2 control-label">Username</label>
                            <div class="col-md-10 inputGroupContainer">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="username" name="username" placeholder="Username" class="form-control" required="true" value="{{(!empty(old('username'))) ? old('username'): ''}}" type="text">
                              </div>
                              <span class="invalid-feedback">
                                @if ($errors->has('username'))
                                  <strong style="color: #e3342f;">{{ $errors->first('username') }}</strong>
                                @endif
                              </span>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label">Password</label>
                            <div class="col-md-10 inputGroupContainer">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="Password" name="password" placeholder="Password. Minimal 6 karakter." class="form-control" required="true" value="" type="password">
                              </div>
                              <span class="invalid-feedback">
                                @if ($errors->has('password'))
                                  <strong style="color: #e3342f;">{{ $errors->first('password') }}</strong>
                                @endif
                              </span>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label">Full Name</label>
                            <div class="col-md-10 inputGroupContainer">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="full_name" name="name" placeholder="Nama Lengkap" class="form-control" required="true" value="{{(!empty(old('username'))) ? old('username'): ''}}" type="text">
                              </div>
                              <span class="invalid-feedback">
                                @if ($errors->has('name'))
                                  <strong style="color: #e3342f;">{{ $errors->first('name') }}</strong>
                                @endif
                              </span>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-2 control-label">Kategori</label>
                            <div class="col-md-6 inputGroupContainer">
                              <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                <select name="category" id="category" class="form-control">
                                  <option disabled selected value> -- Kategori User -- </option>
                                  @foreach($categories as $category)
                                    <option value="{{$category['id']}}" @if (old('category') == $category['id']) selected="" @endif>{{ ucwords($category['name'])}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <span class="invalid-feedback">
                                @if ($errors->has('category'))
                                  <strong style="color: #e3342f;">{{ $errors->first('category') }}</strong>
                                @endif
                              </span>
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
@endsection