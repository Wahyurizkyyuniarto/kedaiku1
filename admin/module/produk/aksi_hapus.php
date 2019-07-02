<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, ANda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	
	$id_barang = $_GET['id_barang'];

	$queryHapus= mysqli_query($connection, "DELETE FROM barang WHERE id_barang='$id_barang'");

	
	if ($queryHapus) {
		echo "<script> alert ('Data Barang berhasil dihapus'); window.location = '$admin_url'+'adminweb.php?module=produk';</script>";
	} else {
		echo "<script> alert('Data Barang gagal dihapus '); window.location = '$admin_url'+'adminweb.php?module=produk';</script>";
		}
	}
	?>