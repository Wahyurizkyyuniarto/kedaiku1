<?php 

session_start ();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	
	$querySimpan = mysqli_query ($connection, "INSERT INTO admin (nama, username, password, email) VALUES ('$nama', '$username', '$password', '$email')");
	
	if ($querySimpan) {
		echo "<script> alert('Data admin Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=admin';</script>";
	} else {
		echo "<script> alert('Data admin Gagal Dimasukan ');window.location = '$admin_url'+'adminweb.php?module=tambah_admin'; </script>";
		}
	}
	?> 