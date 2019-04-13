   
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>E-RPJMD</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> -->
  <link href="{{ asset('asset/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- Font Awesome -->
  <link href="{{ asset('asset/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"/>
  <!-- Ionicons -->
  <link href="{{ asset('asset/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet"/>
  <!-- Theme style -->
  <link href="{{ asset('asset/dist/css/AdminLTE.min.css') }}" rel="stylesheet"/>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="{{ asset('asset/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet"/>
  
  <!-- Morris chart -->
  <!-- <link href="{{ asset('../asset/bower_components/morris.js/morris.css') }}" rel="stylesheet"/> -->
  <!-- jvectormap -->
  <!-- <link href="{{ asset('../asset/bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet"/> -->
  <!-- Date Picker -->
  <!-- <link href="{{ asset('../asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"/> -->
  <!-- Daterange picker -->
  <!-- <link href="{{ asset('../asset/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet"/> -->
  <!-- bootstrap wysihtml5 - text editor -->
  <!-- <link href="{{ asset('.../asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet"/> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    html,body{
           width: 100%;
         height: 100%;
    }
     body {
        
    }
    #circle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
      width: 150px;
        height: 150px;  
    }
    .loader {
        width: calc(100% - 0px);
      height: calc(100% - 0px);
      border: 8px solid #162534;
      border-top: 8px solid #09f;
      border-radius: 50%;
      animation: rotate 5s linear infinite;
    }
    
    @keyframes rotate {
    100% {transform: rotate(360deg);}
    } 
    </style>
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
                <a href="{{ url('admin/logout') }}" class="logo">
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
              <a href="{{ url('admin/showtambahuser') }}">
                <i class="fa"></i> <span>Tambah User</span>            
              </a>          
            </li>
            <li>
              <a href="{{ url('admin/showUser') }}">
                <i class="fa"></i> <span>Seluruh User</span>            
              </a>          
            </li>
            
          </ul>
        </section>
      </aside>

      <div class="content-wrapper" id="contents">
        @yield('content')
      </div>

  </div>


<script src="{{asset('asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('asset/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
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
<script src="{{asset('asset/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- <script src="../../asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<script src="{{asset('asset/dist/js/adminlte.min.js')}}"></script>
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
© 2019 GitHub, Inc.
Terms
Privacy
Security
Status
Help
Contact GitHub
Pricing
API
Training
Blog
About
