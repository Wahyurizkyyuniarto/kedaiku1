<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, ANda harus login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
	
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	
	$idOrder = $_POST['id_order'];
	$queryEdit = mysqli_query($connection, "UPDATE tb_order SET id_order='$idOrder' WHERE id_order='$idOrder'");
	
	if ($queryEdit) {
		echo "<script> alert ('Data Biaya Behasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=pesanan';</script>";
	} else {
		echo "<script> alert('Data Biaya Gagal Diubah '); window.location = '$admin_url'+'adminweb.php?module=edit_pesanan&id_order='+'$idOrder';>/script>";
		}
	}
	?>
	