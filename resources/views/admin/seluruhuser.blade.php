@extends('admin.layout.layout')
@section('content')
  
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Seluruh User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th>No</th> -->
                  <th>ID</th>
                  <th>Username</th>
                  <th>Fullname</th>
                  <th>Category</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $index => $dat)
            <tr>
                <td>
                {{$dat->id}}
                </td>
                <td>
                {{$dat->username}}
                </td>
                <td>
                {{$dat->full_name}}
                </td>
                <td>
                {{$dat->category}}
                </td>   
            </tr>
            @endforeach
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

@endsection