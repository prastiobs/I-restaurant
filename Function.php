<?php
	include 'Config.php';
	session_start();

	if (isset($_POST['logout'])) {
		session_unset();
    	session_destroy();
  		header('Location: http://localhost/restaurant/Index.php');
	}
	if(isset($_POST['daftar']))
	{
			$registrasi = "INSERT INTO akun(username, password, firstName, lastName, email, gender, jenisAkun) 
					   VALUES ('".$_POST['username']."',
					   			'".$_POST['password']."',
					   		   '".$_POST['firstName']."',
					   		   '".$_POST['lastName']."',
					   		   '".$_POST['email']."',
					   		   '".$_POST['gender']."',
							   'pelanggan')";

		mysqli_query($connect, $registrasi) or die (mysqli_error($connect));		
		echo '<script language="javascript">';
			echo 'alert("Pendaftaran Berhasil")';
			echo '</script>';
	}

	if(isset($_POST['login']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$cekakun = "SELECT * FROM akun WHERE username = '".$username."' AND password = '".$password."'";

		$data_select = mysqli_query($connect, $cekakun) or die (mysqli_error($connect));
		$data = mysqli_num_rows($data_select);

		if ($data > 0) {
			$row = mysqli_fetch_array($data_select);
			$_SESSION['sessionlogin'] = true;
			$_SESSION['pengguna'] = $row['username'];
			$_SESSION['namauser'] = $row['firstName']." ".$row['lastName'];
			if ($row['jenisAkun']=='kasir') {
				header('Location: http://localhost/restaurant/IndexKasir.php');
			} else if ($row['jenisAkun']=='koki') {
				header('Location: http://localhost/restaurant/IndexKoki.php');
			}else if ($row['jenisAkun']=='pelanggan') {
				header('Location: http://localhost/restaurant/IndexPelanggan.php');
			}
		}else{
			$error = true;
		}
	}

	if (isset($_POST['hapusproduk'])) {
       	$hapusproduk  = "DELETE FROM produk WHERE idProduk = '".$_POST['idProduk']."'";	
		
		mysqli_query($connect, $hapusproduk) or die (mysqli_error($connect));
			
		header('Location: http://localhost/restaurant/kelolaMenu.php');
    }
    if (isset($_POST['hapuspesanan'])) {
       	$hapusproduk  = "DELETE FROM `order` WHERE `order`.`idOrder` = '".$_POST['idOrder']."'";	
		
		mysqli_query($connect, $hapusproduk) or die (mysqli_error($connect));
			
		header('Location: http://localhost/restaurant/LihatPesananPelanggan.php');
    }
    if (isset($_POST['pesanproduk'])) {
    	if ($_POST['jumlah'] <= $_POST['stokProduk']) {
    		$biayaOrder = $_POST['jumlah'] * $_POST['hargaProduk'];
    		$tambahbuku = "INSERT INTO `order`(`username`, `idProduk`, `jumlah`, `jenisOrder`, `biayaOrder`, `statusOrder`) VALUES ('".$_POST['username']."','".$_POST['idProduk']."','".$_POST['jumlah']."','".$_POST['jenisOrder']."','".$biayaOrder."','belum lunas')";
		    mysqli_query($connect, $tambahbuku) or die (mysqli_error($connect));
		    //UPDATE STOK MAKANAN
		    $stokBaru = $_POST['stokProduk'] - $_POST['jumlah'];

		    mysqli_query($connect, "UPDATE `produk` SET `stokProduk` = '".$stokBaru."' WHERE `produk`.`idProduk` = '".$_POST['idProduk']."'") or die (mysqli_error($connect));
		    header('Location: http://localhost/restaurant/PesanMakanan.php');
    	}else{
    		echo '<script language="javascript">';
			echo 'alert("Maaf Stok Produk Tidak Cukup")';
			echo '</script>';
    	}
    }
    if (isset($_POST['batalpesan'])) {
       	$batalpesan  = "DELETE FROM `order` WHERE idOrder = '".$_POST['idOrder']."'";	
		
		mysqli_query($connect, $batalpesan) or die (mysqli_error($connect));
		//UPDATE STOK MAKANAN
	    $stokBaru = $_POST['stokProduk'] + $_POST['jumlah'];

		mysqli_query($connect, "UPDATE `produk` SET `stokProduk` = '".$stokBaru."' WHERE `produk`.`idProduk` = '".$_POST['idProduk']."'") or die (mysqli_error($connect));
		header('Location: http://localhost/restaurant/LihatOrderMakanan.php');
    }
    

?>