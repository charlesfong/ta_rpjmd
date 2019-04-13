<!DOCTYPE html>
<html lang="en">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link href="https://cdn.jsdelivr.net/npm/startbootstrap-modern-business@4.1.1/css/modern-business.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<head>
  

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
.imgz{
  background-image: url('https://visualpharm.com/assets/314/Admin-595b40b65ba036ed117d36fe.svg');
  background-repeat: no-repeat;
  background-position: center; 
}
@keyframes rotate {
100% {transform: rotate(360deg);}
} 
</style>
</head>
<body>
  <div id="load">
    <div id="circle">
      <div class="loader">
        <div class="loader">
          <div class="loader">
           <div class="loader">

           </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
  <div id="contents">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">E-RPJMD</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <div class="dropdown">
                <form action="{{route('showLogin')}}" method="get">
                  <button class="btn btn-secondary" type="submit" aria-haspopup="true" aria-expanded="false">Login</button>
                </form>
              </div>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="services.html">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>

    <header>
     <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- ol class="carousel-indicators">
          <li data-slide-to="0" class="active"></li>
          <li data-slide-to="1"></li>
          <li data-slide-to="2"></li>
        </ol> -->
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>
          </div>
          
          <!-- <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>
          
          <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
            </div>
          </div> -->
        </div>
        <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a> -->
      </div>
    </header>

    <!-- Page Content -->


      

      <!-- Marketing Icons Section -->
      

    <footer class="py-5 bg-dark">
      <div class="container">
        <!-- <p class="m-0 text-center text-white">Copyright &copy; CFPLA Website 2018</p> -->
      </div>
    </footer>
  <script src="{{asset('js/app.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

  <script language="javascript" type="text/javascript">
  document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
  document.getElementById('contents').style.visibility="hidden";
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
         document.getElementById('contents').style.visibility="visible";
      },1000);
  }
}
</script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>
