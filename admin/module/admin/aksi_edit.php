<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login<br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	
	$idAdmin=$_POST['id_admin'];
	$nama= $_POST['nama'];
	$username= $_POST['username'];
	$password= $_POST['password'];
	$email= $_POST['email'];
	$queryEdit = mysqli_query($connection, "UPDATE admin SET nama='$nama', username='$username', password='$password', email='$email' WHERE id_admin='$idAdmin'");
	if($queryEdit){
		echo "<script> alert('Data Admin Berhasil Dirubah');window.location='$admin_url'+'adminweb.php?module=admin';</script>";
	}else{
		echo "<script> alert('Data Admin  Gagal Dirubah'); window.location = 'admin_url'+'adminweb.php?module=edit_admin='+$idAdmin';</script>";
	}
}

?>