<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login<br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
	include "../lib/config.php";
	include "../lib/koneksi.php";
	
	$id_pelanggan=$_SESSION['pelanggan'];
	$password= $_POST['password'];
	$password1= $_POST['password1'];


	$queryEdit = mysqli_query($connection, "UPDATE pelanggan SET password='$password1' WHERE id_pelanggan='$id_pelanggan'");
	if($queryEdit){
		echo "<script> alert('Data Berhasil Dirubah');window.location=member/profile/php;</script>";
	}else{
		echo "<script> alert('Data Admin  Gagal Dirubah'); window.location = member/profile.php;</script>";
	}
}

?>