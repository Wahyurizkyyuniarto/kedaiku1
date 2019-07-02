<?php 

session_start ();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../../index.php><b>LOGIN</b></a></center>";
} else {
	include "../../../config/config.php";
	include "../../../config/koneksi.php";
	
	$nama = $_POST['nama'];
	$status = $_POST['status_order'];
	$tgl = $_POST['tgl_order'];
	$biaya = $_POST['biaya'];
	$querySimpan = mysqli_query ($connection, "INSERT INTO tb_order (nama, status_order, tgl_order, jam_order, total, biaya)
				VALUES ('$nama','$status','$tgl', '$jam', '$biaya')");
	
	if ($querySimpan) {
		echo "<script> alert('Data pesanan Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=pesanan';</script>";
	} else {
		echo "<script> alert('Data pesanan Gagal Dimasukan ');window.location = '$admin_url'+'adminweb.php?module=tambah_pesanan'; </script>";
		}
	}
	?>