@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="username" style="width: 350px" value="{{ old('username') }}" autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" style="width: 350px" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="sel1" class="col-md-4 control-label">Select Category</label>
                            <div class="col-md-6">
                                <select class="form-control " style="width: 350px" id="category">
                                <option value="KepalaDaerah">   Kepala Daerah</option>
                                <option value="Bappeda"     >   Bappeda</option>
                                <option value="KepalaOPD"   >   Kepala OPD</option>
                                <option value="OPD"         >   OPD</option>
                                <option value="TimAhli"     >   Tim Ahli</option>
                                <option value="Admin"     >   Admin</option>
                              </select>
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
