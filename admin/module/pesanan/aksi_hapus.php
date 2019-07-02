<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	
	$idOrder = $_GET['id_order']; 
	$queryHapus = mysqli_query($connection, "DELETE FROM tb_order WHERE id_order='$idOrder'");
	if ($queryHapus) {
		echo "<script> alert ('Data biaya berhasil dihapus'); window.location = '$admin_url'+'adminweb.php?module=pesanan';</script>";
	} else {
		echo "<script> alert('Data biaya gagal dihapus '); window.location = '$admin_url'+'adminweb.php?module=pesanan';</script>";
		}
	}
	?>