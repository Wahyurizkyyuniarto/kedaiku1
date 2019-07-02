<?php 

include "lib/koneksi.php";
include "lib/config.php";

	//penulisan variabel2 yg dikirim
	//$username		= "well";	
	//$nama			= $_POST['nama'];

	//$alamat			= $_POST['alamat'];
	//$email			= $_POST['email'];
	//$no_hp			= $_POST['no_hp'];
	//$password		= $_POST['password'];

	$username 	= $_POST['username'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$no_hp = $_POST['no_hp'];
	$password = $_POST['password'];

				
		//sql input database
		  $input = mysqli_query($connection, "INSERT INTO pelanggan (
										 
										 username,
										 password,
										 nama,
										 alamat,
										 email,
										 no_hp)
								VALUES (
										'$username',
										'$password',
										'$nama',
										'$alamat',
										'$email',
										'$no_hp')");

		if (! $input){
			echo mysqli_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan. ')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan.')</script>";
			echo "<meta http-equiv='refresh'content='0;url=login.php'>";
		}
	?>
 
				

