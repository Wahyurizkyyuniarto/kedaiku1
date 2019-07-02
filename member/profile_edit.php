<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login<br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
	include "../lib/config.php";
	include "../lib/koneksi.php";
	
	$id_pelanggan=$_SESSION['pelanggan'];
	$nama= $_POST['nama'];
	$username= $_POST['username'];
	$alamat= $_POST['alamat'];
	$email= $_POST['email'];
	$no_hp= $_POST['no_hp'];

	$queryEdit = mysqli_query($connection, "UPDATE pelanggan SET nama='$nama', username='$username', alamat='$alamat', email='$email' , no_hp='$no_hp' WHERE id_pelanggan='$id_pelanggan'");
	if($queryEdit){
		echo "<script> alert('Data Berhasil Dirubah');window.location='./profile.php';</script>";
	}else{
		echo "<script> alert('Data Admin  Gagal Dirubah'); window.location = './profile.php;</script>";
	}
}

?>