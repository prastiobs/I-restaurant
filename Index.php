<?php
  include('Function.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="assets/css/bootstrap.css" rel="stylesheet"/>
  <link href="assets/css/font-awesome.css" rel="stylesheet"/>
  <link href="assets/css/custom.css" rel="stylesheet"/>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
  body{
    background-image: url(images/1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    font-family: Courier New;
  }
  .mySlides {display: none;}
    /* Slideshow container */
  .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
  }

  /* Caption text */
  .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  /* The dots/bullets/indicators */
  .dot {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }

  .active {
    background-color: #717171;
  }

  /* Fading animation */
  .fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
  }

  @-webkit-keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
  }

  @keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
  }

  /* On smaller screens, decrease text size */
  @media only screen and (max-width: 300px) {
    .text {font-size: 11px}
  }
  .dropdown-toggle{
    background-color: #FFA500;
    border : 0px;
  }
  .atas{
    background-color: #FFA500;
  }
  .tengah{
    padding-top: 20px;
    padding-bottom: 20px;
    background-color: #FFF8DC;
    margin-top: 40px;
    background-color: rgba(190, 190, 189, 0.8);
    color: white;
  }
  .tengah1{
    background-color: #FFF8DC;
  }
  .isitengah{
    background-color: white;
    border-radius: 20px;
    margin-top: 40px;
    margin-bottom: 40px;
    padding-top: 20px;
    padding-bottom: 20px;
  }
  .textwarna{
    color: #483D8B;
  }
  #menunavbar{
    color: #483D8B;
  }
  .bawah{
    background-color: #FFA500;
    padding-top: 20px;
    padding-bottom: 20px;
  }
  .navbar,.navbar-brand{
    background-color: #FFA500;
    border : 0px;
  }
  .navbar-brand{
    font-weight: bold;
  }
  #tittle{
    font-size: 28px;
    font-weight: bold;
  }
  .btnnavbar{
    background-color: #FFA500;
  }
  .isislide{
    padding-top: 20px;
    padding-bottom: 20px;
    padding-right: 20px;
    padding-left: 20px;
    width: 1000px;
    height: 300px;
  }
  #menunavbarnow{
    color: #FFF8DC;
  }
</style>
<body>
  <!-- list WARNA #F8F9FA; #A81110; #E2DCC5 -->
  <div class="container-fluid atas"> <!-- BAGIAN ATAS WARNA MERAH -->
    <div class="container">
      <div>
        <h2 class="site-tittle">
          <a style="float: left;" href="http://localhost/restaurant/Index.php"><img src="images/logo-restaurant.png" width="80" height="80"></a> <!-- LOGO TELKOM -->
        </h2>
        <br><p id="tittle" class="site-description textwarna"><b>___  I - RESTAURANT</b></p> <!-- DESKRIPSI LOGO TELKOM -->
      </div>
      <div atas>
        <br>
        <hr> <!-- GARIS HORIZONTAL -->
      </div>
      <nav class="navbar navbar-inverse col-md-12 col-sm-12 col-lg-12">
        <div class="container-fluid">
            <div class="navbar-header">
                <a id="menunavbarnow" class="navbar-brand" href="http://localhost/restaurant/Index.php">Home</a>
            </div>
            <ul class="nav navbar-nav">
              <li><a id="menunavbar" href="http://localhost/restaurant/DaftarMenu.php">Daftar Menu</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <button class="btn btn-lg btnnavbar textwarna" data-toggle="modal" data-target="#modallogin"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>
              <!-- MODAL LOGIN -->
              <div class="modal fade" id="modallogin" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <!-- MODAL LOGIN HEADER -->
                    <div class="modal-header text-center">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h3 class="modal-title w-100 font-weight-bold">LOGIN</h3>
                    </div>
                    <form action="" method="post">
                      <!-- MODAL LOGIN BODY -->
                      <div class="modal-body mx-3">
                          <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" required>
                          </div>
                          <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required>
                          </div>
                      </div>
                      <!-- MODAL LOGIN FOOTER-->
                      <div class="modal-footer">
                        <input type="submit" name="login" class="btn btn-success btn-block btn-lg" value="Login">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- MODAL LOGIN BERAKHIR -->
              <button class="btn btn-lg btnnavbar textwarna" data-toggle="modal" data-target="#modalsignup"><span class="glyphicon glyphicon-user"></span> Daftar</button>
              <!-- MODAL REGISTRASI -->
              <div class="modal fade" id="modalsignup" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <!-- MODAL REGISTRASI HEADER-->
                    <div class="modal-header text-center">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h3 class="modal-title w-100 font-weight-bold">REGISTRASI</h3>
                    </div>
                    <form action="" method="post">
                    <!-- MODAL REGISTRASI BODY -->
                    <div class="modal-body mx-3">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-lg-6">
                            <div class="form-group">
                              <input type="text" name="firstName" id="firstName" class="form-control input-lg" placeholder="First Name" required>
                            </div>
                          </div>
                          <div class="col-md-6 col-sm-6 col-lg-6">
                            <div class="form-group">
                              <input type="text" name="lastName" id="lastName" class="form-control input-lg" placeholder="Last Name">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                          <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Anda" required>
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                          <select class="form-control input-lg" id="exampleFormControlSelect1" name="gender" required>
                            <option value="">---Select Gender---</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                    </div>
                    <!-- MODAL REGISTRASI FOOTER-->
                    <div class="modal-footer">
                      <input type="submit" name="daftar" class="btn btn-success btn-block btn-lg" value="Daftar">
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- MODAL BERAKHIR -->
            </ul>
        </div>
      </nav>
    </div>
  </div>
  <!-- BAGIAN TENGAH ISI HALAMAN WEB -->
  <div class="container-fluid tengah1">
    <div class="container tengah">
      <div class="slideshow-container">
        <div class="isislide">
        <!-- PLUGIN SLIDES -->
          <div class="mySlides fade">
            <div class="col-md-4 col-sm-4 col-lg-4">
              <img src="images/nasi-goreng.jpg" class="img-circle" alt="Cinque Terre" width="304" height="236">
            </div>
            <div class="col-md-8 col-sm-8 col-lg-8">
                <h2>Nasi Goreng Spesial</h2>
                <h4></h4>
                <strong></strong>
            </div>
          </div>
          <div class="mySlides fade">
            <div class="col-md-4 col-sm-4 col-lg-4">
              <img src="images/Resep-Bakso-malang.jpg" class="img-circle" alt="Cinque Terre" width="304" height="236">
            </div>
            <div class="col-md-8 col-sm-8 col-lg-8">
                <h2>Baso Malang</h2>
                <h4></h4>
                <strong></strong>
            </div>
          </div>
          <div class="mySlides fade">
            <div class="col-md-4 col-sm-4 col-lg-4">
              <img src="images/sop-buntut-50406367.jpg" class="img-circle" alt="Cinque Terre" width="304" height="236">
            </div>
            <div class="col-md-8 col-sm-8 col-lg-8">
                <h2>Sop Buntut</h2>
                <h4></h4>
                <strong></strong>
            </div>
          </div>
        </div>
      </div>
      <br>
      <!-- PLUGIN DOT -->
      <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
      </div>
      <!-- BAGIAN TENGAH ISI HALAMAN WEB -->
    </div>
  </div>
  <div class="container-fluid tengah1">
    <div class="container isitengah">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <center>
          <h1>Selamat Datang di  - RESTAURANT</h1>
          <h3>Food is our common ground, a universal experience</h3>
        </center>
      </div>
    </div>
  </div>
  <!-- BAGIAN BAWAH HALAMAN WEB ISINYA INFORMASI PERPUSTAKAAN-->
  <div class="container-fluid bawah">
    <div class="container">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="col-md-4 col-sm-4 col-lg-4">
          <h4 class="textwarna"><b>Hubungi Kami</b></h4>
          <span class="glyphicon glyphicon-phone textwarna"> 082214504980</span>
          <br>
          <span class="glyphicon glyphicon-envelope textwarna"> dzaki.madhani@gmail.com</span>
          <br>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4">
          <h4 class="textwarna"><b>Lokasi Restoran</b></h4>
          <p class="textwarna">Gedung Informatika lantai 3</p>
          <p class="textwarna">Jl. Telekomunikasi - Ters. Buah Batu Bandung 40257 Indonesia</p>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4">
          <center>
            <img src="images/logo-restaurant.png" width="40%">
            <h4 class="textwarna"><b>I - Restaurant</b></h4>
          </center>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  var slideIndex = 0;
  showSlides();

  function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
         slides[i].style.display = "none";  
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}    
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
  }
</script>
</html>