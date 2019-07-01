   
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
          <span class="logo-lg"><b>{{Auth::user()->user_categories[0]['name']}}</b></span>
        </a>
        <nav class="navbar navbar-static-top">
          <div style="margin: auto; background-color: #3c8dbc; width: 100%; text-align: center; padding: 0px;" href="" class="logo">
            <a href="{{ route('logout') }}" class="logo" style="float: right; margin-right: 0px;">
              <span class="logo-lg"><b>Logout</b></span>
            </a>
            <span class="logo-lg">
              <b>E-RPJMD</b>
            </span>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar" >
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">
              
            <li>
              <a href="{{ route('dashboard') }}">
                <i class="fa"></i> <span>Dashboard</span>            
              </a>          
            </li>
            </li>
              <li>
                <a href="{{ route('browseVisiMisi') }}">
                  <i class="fa"></i> <span>Seluruh Visi Misi</span>            
                </a>          
              </li>
              <li>
                <a href="{{ route('addVisiMisi') }}">
                  <i class="fa"></i> <span>Input Visi dan Misi</span>            
                </a>          
              </li>
              <li>
                <a href="{{ route('browseTujuan') }}">
                  <i class="fa"></i> <span>Seluruh Tujuan</span>            
                </a>
              <li>
                <a href="{{ route('addTujuan') }}">
                  <i class="fa"></i> <span>Input Tujuan</span>            
                </a>          
              </li>
              <li>
                <a href="{{ route('browseSasaran') }}">
                  <i class="fa"></i> <span>Seluruh Sasaran</span>
                </a>
              <li>
                <a href="{{ route('addSasaran') }}">
                  <i class="fa"></i> <span>Input Sasaran</span>            
                </a>          
              </li>
              <li>
                <a href="{{ route('browseIndikator') }}">
                  <i class="fa"></i> <span>Seluruh Indikator</span>
                </a>
              <li>
                <a href="{{ route('addIndikator') }}">
                  <i class="fa"></i> <span>Input Indikator</span>
                </a>          
              </li>
              <li>
                <a href="#"><span>AHP MISI</span></a>
                  <li>
                    <a href="{{ route('addKriteriaMisi') }}">
                      <i class="fa"></i> <span>Input Kriteria Misi</span>            
                    </a>          
                  </li>
                  <li>
                    <a href="{{ route('showKriteriaMisi') }}">
                      <i class="fa"></i> <span>Nilai Kriteria Misi</span>            
                    </a>          
                  </li>
                  <li>
                    <a href="{{ route('showNilaiMisi') }}">
                      <i class="fa"></i> <span>Nilai Alternatif Misi</span>           
                    </a>         
                  </li>
                  <li>
                    <a href="{{ route('hasilAhpMisi') }}">
                      <i class="fa"></i> <span>Hasil Seleksi Misi</span>            
                    </a>          
                  </li>    
              </li>
              <li>
                <a href="#"><span>AHP TUJUAN</span></a>
                  <li>
                    <a href="{{ route('addKriteriaTujuan') }}">
                      <i class="fa"></i> <span>Input Kriteria Tujuan</span>            
                    </a>          
                  </li>
                  <li>
                    <a href="{{ route('showKriteriaTujuan') }}">
                      <i class="fa"></i> <span>Nilai Kriteria Tujuan</span>            
                    </a>          
                  </li>
                  <li>
                    <a href="{{ route('showNilaiTujuan') }}">
                      <i class="fa"></i> <span>Nilai Alternatif Tujuan</span>           
                    </a>         
                  </li>
                  <li>
                    <a href="{{ route('hasilAhpTujuan') }}">
                      <i class="fa"></i> <span>Hasil Seleksi Tujuan</span>            
                    </a>          
                  </li>    
              </li>
              <li>
                <a href="#"><span>AHP SASARAN</span></a>
                  <li>
                    <a href="{{ route('addKriteriaSasaran') }}">
                      <i class="fa"></i> <span>Input Kriteria Sasaran</span>            
                    </a>          
                  </li>
                  <li>
                    <a href="{{ route('showKriteriaSasaran') }}">
                      <i class="fa"></i> <span>Nilai Kriteria Sasaran</span>            
                    </a>          
                  </li>
                  <li>
                    <a href="{{ route('showNilaiSasaran') }}">
                      <i class="fa"></i> <span>Nilai Alternatif Sasaran</span>           
                    </a>         
                  </li>
                  <li>
                    <a href="{{ route('hasilAhpSasaran') }}">
                      <i class="fa"></i> <span>Hasil Seleksi Sasaran</span>            
                    </a>          
                  </li>    
              </li>
              <li>
                <a href="#"><span>AHP INDIKATOR</span></a>
                  <li>
                    <a href="{{ route('addKriteriaIndikator') }}">
                      <i class="fa"></i> <span>Input Kriteria Indikator</span>            
                    </a>          
                  </li>
                  <li>
                    <a href="{{ route('showKriteriaIndikator') }}">
                      <i class="fa"></i> <span>Nilai Kriteria Indikator</span>            
                    </a>          
                  </li>
                  <li>
                    <a href="{{ route('showNilaiIndikator') }}">
                      <i class="fa"></i> <span>Nilai Alternatif Indikator</span>           
                    </a>         
                  </li>
                  <li>
                    <a href="{{ route('hasilAhpIndikator') }}">
                      <i class="fa"></i> <span>Hasil Seleksi Indikator</span>            
                    </a>          
                  </li>    
              </li>
            @if(Auth::user()->inRole('admin'))
              <li>
                <a href="{{ route('addUser') }}">
                  <i class="fa"></i> <span>Tambah User</span>            
                </a>          
              </li>
              <li>
                <a href="{{ route('browseUser') }}">
                  <i class="fa"></i> <span>Seluruh User</span>            
                </a>          
              </li>
            @endif
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
<!-- <script src="{{asset('asset/bower_components/jquery/dist/jquery.min.js')}}"></script> -->
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

<script>
  @if(session()->has('success'))
    $(document).ready(function () {
      alert("Data Berhasil Disimpan !!!");
    });
    @php session()->forget('success'); @endphp
  @endif
</script>

</body>
</html>
