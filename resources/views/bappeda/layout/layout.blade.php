<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>E-RPJMD</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
  <link href="{{ asset('../asset/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('../asset/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('../asset/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('../asset/dist/css/AdminLTE.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('../asset/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div id="contents">
    <div class="wrapper">
      <header class="main-header">
        <a href="" class="logo">
          <span class="logo-lg"><b>E-RPJMD</b></span>
        </a>
        <nav class="navbar navbar-static-top">
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li>
                <a href="{{ url('bappeda/logout') }}" class="logo">
                  <span class="logo-lg"><b>Logout</b></span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar" >
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">
              
            </li>
            <li>
              <a href="{{ url('bappeda/showInputTujuan') }}">
                <i class="fa"></i> <span>Input Tujuan</span>            
              </a>          
            </li>
            <li>
              <a href="{{ url('bappeda/showTujuan') }}">
                <i class="fa"></i> <span>Seluruh Tujuan</span>            
              </a>          
            </li>
            
          </ul>
        </section>
      </aside>

      <div class="content-wrapper" id="contents">
        @yield('content')
      </div>

  </div>


<!-- <script src="asset/bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- <script src="asset/bower_components/jquery-ui/jquery-ui.min.js"></script> -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- <script src="asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- <script src="asset/bower_components/raphael/raphael.min.js"></script> -->
<!-- <script src="asset/bower_components/morris.js/morris.min.js"></script> -->
<!-- <script src="asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
<!-- <script src="asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
<!-- <script src="asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- <script src="asset/bower_components/jquery-knob/dist/jquery.knob.min.js"></script> -->
<!-- <script src="asset/bower_components/moment/min/moment.min.js"></script> -->
<!-- <script src="asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script> -->
<!-- <script src="asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<!-- <script src="asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
<!-- <script src="asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- <script src="asset/bower_components/fastclick/lib/fastclick.js"></script> -->
<!-- <script src="asset/dist/js/adminlte.min.js"></script> -->
<!-- <script src="asset/dist/js/pages/dashboard.js"></script> -->
<!-- <script src="asset/dist/js/demo.js"></script> -->
<script src="../../asset/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../asset/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- <script src="../../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<script src="../../asset/dist/js/adminlte.min.js"></script>
<!-- <script src="../../asset/bower_components/fastclick/lib/fastclick.js"></script> -->
<!-- <script src="../../asset/dist/js/demo.js"></script> -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>
</html>
