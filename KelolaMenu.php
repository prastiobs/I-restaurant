<?php
  include 'Function.php';
  $tampildatatabel = mysqli_query($connect, "SELECT * FROM produk") ;
  if (!$_SESSION['sessionlogin']) {
    header('Location: http://localhost/restaurant/Index.php');
  }

  if(isset($_POST['updateproduk']))
    {
      $folder = './images/menu/';
      $namaGambar = $_FILES['menu']['name'];
      $tmpGambar = $_FILES['menu']['tmp_name'];
      $ukuranGambar = $_FILES['menu']['size'];
      $tipeGambar = $_FILES['menu']['type'];

      if ($namaGambar == NULL) {
          $editproduk = "UPDATE produk SET
              namaProduk = '".$_POST['namaProduk']."', 
              jenisProduk = '".$_POST['jenisProduk']."', 
              stokProduk = '".$_POST['stokProduk']."',
              hargaProduk = '".$_POST['hargaProduk']."'
              WHERE idProduk = '".$_POST['idProduk']."'"; 

              mysqli_query($connect, $editproduk) or die (mysqli_error($connect));  
      
              header('Location: http://localhost/restaurant/KelolaMenu.php');
      }else{
          $editproduk = "UPDATE produk SET
              namaProduk = '".$_POST['namaProduk']."', 
              jenisProduk = '".$_POST['jenisProduk']."', 
              stokProduk = '".$_POST['stokProduk']."',
              hargaProduk = '".$_POST['hargaProduk']."',
              gambarProduk = '".$namaGambar."',
              tipeFile = '".$tipeGambar."'
              WHERE idProduk = '".$_POST['idProduk']."'"; 

              move_uploaded_file($tmpGambar, $folder.$namaGambar);

              mysqli_query($connect, $editproduk) or die (mysqli_error($connect));  
      
              header('Location: http://localhost/restaurant/KelolaMenu.php');
      }
    }

  if (isset($_POST['tambahproduk'])) 
  {
    $folder = './images/menu/';
    $namaGambar = $_FILES['menu']['name'];
    $tmpGambar = $_FILES['menu']['tmp_name'];
    $ukuranGambar = $_FILES['menu']['size'];
    $tipeGambar = $_FILES['menu']['type'];

    move_uploaded_file($tmpGambar, $folder.$namaGambar);

    $tambahproduk = "INSERT INTO produk(namaProduk, jenisProduk, stokProduk, hargaProduk, gambarProduk, tipeFile) 
             VALUES ('".$_POST['namaProduk']."',
                   '".$_POST['jenisProduk']."',
                   '".$_POST['stokProduk']."',
                   '".$_POST['hargaProduk']."',
                   '".$namaGambar."',
                   '".$tipeGambar."')";
    mysqli_query($connect, $tambahproduk) or die (mysqli_error($connect));
    header('Location: http://localhost/restaurant/KelolaMenu.php');
  }
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

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

  
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
  .textwarnamerah{
    color: red;
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
  <?php 
  $sql = "SELECT * FROM akun WHERE username = '".$_SESSION['pengguna']."'";
  $data = mysqli_query($connect,$sql);
  $rowprofil = mysqli_fetch_array($data);
  ?>
  <!-- list WARNA #F8F9FA; #A81110; #E2DCC5 -->
  <div class="container-fluid atas"> <!-- BAGIAN ATAS WARNA MERAH -->
    <div class="container">
      <div>
        <h2 class="site-tittle">
          <a style="float: left;" href="#"><img src="images/logo-restaurant.png" width="80" height="80"></a> <!-- LOGO TELKOM -->
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
                <a id="menunavbar" class="navbar-brand" href="http://localhost/restaurant/IndexKoki.php">Home</a>
            </div>
            <ul class="nav navbar-nav">
              <li><a id="menunavbar" href="http://localhost/restaurant/LihatPesananPelanggan.php">Lihat Pesanan Pelanggan</a></li>
              <li><a id="menunavbarnow" href="http://localhost/restaurant/KelolaMenu.php">kelola Menu</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <form method="POST">
                <button type="submit" class="btn btn-lg btnnavbar textwarna" name="logout"><span class="glyphicon glyphicon-log-out"></span> Keluar</button>
              </form>
            </ul>
        </div>
      </nav>
    </div>
  </div>
  <!-- BAGIAN TENGAH ISI HALAMAN WEB -->
  <div class="container-fluid tengah1">
    <div class="container isitengah">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <!-- TAMBAH PRODUK -->
        <div>
          <center>
            <button class="btn btn-lg btn-default" data-toggle="modal" data-target="#modaltambahproduk"><span class="glyphicon glyphicon-plus"></span> Tambah Produk</button>
          </center>
          <!-- MODAL TAMBAH BUKU -->
          <div class="modal fade" id="modaltambahproduk" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <!-- MODAL TAMBAH PRODUK HEADER -->
                <div class="modal-header text-center">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h3 class="modal-title w-100 font-weight-bold textwarna"><b>TAMBAH PRODUK BARU</b></h3>
                </div>
                <form method="post" enctype="multipart/form-data">
                  <!-- MODAL TAMBAH PRODUK BODY -->
                  <div class="modal-body mx-3">
                      <div class="form-group">
                        <label class="textwarna">Nama Produk</label>
                        <input type="text" name="namaProduk" class="form-control required">
                      </div>
                      <div class="form-group">
                        <label class="textwarna">Jenis Menu</label>
                        <select class="form-control" size="0" name="jenisProduk" id="jenisProduk" required>
                          <option value="">---Pilih---</option>
                          <option value="Makanan">Makanan</option>
                          <option value="Minuman">Minuman</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="textwarna">Stok</label>
                        <input name="stokProduk" value="1" type="number" min="1" max="999" required>
                      </div>
                      <div class="form-group">
                        <label class="textwarna">Harga</label>
                        <input type="text" name="hargaProduk" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <input type="file" name="menu" class="form-control-file input-lg" required>
                      </div>                     
                  </div>
                  <!-- MODAL TAMBAH BUKU BARU FOOTER-->
                  <div class="modal-footer">
                    <input type="submit" name="tambahproduk" class="btn btn-success btn-block btn-lg tambahkan" value="Tambahkan">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <br>
        <table class="table" id="tablemenu">
          <thead>
            <tr>
              <th>Nama Produk</th>
              <th>Jenis Produk</th>
              <th>Stok</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_array($tampildatatabel)) { ?>
            <tr>
              <td width="100">
                <img src="images/menu/<?=$row['gambarProduk'] ?>" width="150" height="150">
                <center><?= $row['namaProduk'] ?></center>
              </td>
              <td><?= $row['jenisProduk'] ?></td>
              <td><?= $row['stokProduk'] ?></td>
              <td>Rp.<?= $row['hargaProduk'] ?></td>
              <td>
                <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modaledit<?= $row['idProduk'] ?>"><span class="glyphicon glyphicon-edit"></span></button>
                <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modalhapus<?= $row['idProduk'] ?>"><span class="glyphicon glyphicon-trash"></span></button>
              </td>
              </td>
            </tr>
            <!-- MODAL EDIT PRODUK -->
            <div class="modal fade" id="modaledit<?= $row['idProduk'] ?>" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <!-- MODAL EDIT PRODUK HEADER -->
                  <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title w-100 font-weight-bold textwarna"><b>UPDATE DATA PRODUK</b></h3>
                  </div>
                  <form method="post" enctype="multipart/form-data">
                    <!-- MODAL EDIT PRODUK BODY -->
                    <div class="modal-body mx-3">
                        <div class="form-group">
                          <label class="textwarna">Nama Produk</label>
                          <input type="text" name="namaProduk" class="form-control" required value="<?= $row['namaProduk'] ?>">
                          <input type="hidden" name="idProduk" class="form-control" value="<?= $row['idProduk'] ?>">
                        </div>
                        <div class="form-group">
                          <label class="textwarna">Jenis Produk</label>
                          <select class="form-control" size="0" name="jenisProduk" id="jenisProduk" required>
                            <option class="textwarnamerah" value="">---Pilih---</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="textwarna">Stok</label>
                          <input name="stokProduk" value="<?= $row['stokProduk'] ?>" type="number" min="1" max="999" required>
                        </div>
                        <div class="form-group">
                          <label class="textwarna">Harga</label>
                          <input type="text" name="hargaProduk" class="form-control" value="<?= $row['hargaProduk'] ?>" required>
                        </div>
                        <div class="form-group">
                          <input type="file" name="menu" class="form-control-file input-lg">
                        </div>
                    </div>
                    <!-- MODAL EDIT PRODUK BARU FOOTER-->
                    <div class="modal-footer">
                      <input type="submit" name="updateproduk" class="btn btn-success btn-block btn-lg tambahkan" value="Update">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- MODAL HAPUS BUKU -->
            <div class="modal fade" id="modalhapus<?= $row['idProduk'] ?>" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <!-- MODAL HAPUS PRODUK HEADER -->
                  <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title w-100 font-weight-bold textwarna"><b>HAPUS DATA PRODUK</b></h3>
                  </div>
                  <form action="" method="post">
                    <!-- MODAL HAPUS PRODUK BODY -->
                    <div class="modal-body mx-3">
                        <h5 class="modal-title textwarna" id="exampleModalLabel">Apa anda yakin ingin menghapus menu <?= $row['namaProduk'] ?>?</h5>
                    </div>
                    <!-- MODAL EDIT PRODUK BARU FOOTER-->
                    <div class="modal-footer">
                      <form method="POST" action="">
                        <input type="hidden" name="idProduk" class="form-control" value="<?= $row['idProduk'] ?>">
                        <button type="submit" name="hapusproduk" class="btn btn-danger">YA</a>
                      </form>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
          </tbody>
        </table>
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
<script type="text/javascript">
  $(document).ready( function () {
    $('#tablemenu').DataTable();
  } );
</script>
</html>