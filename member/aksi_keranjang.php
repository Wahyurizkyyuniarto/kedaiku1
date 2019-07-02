<?php
session_start();
include "lib/koneksi.php";
$SessionId=session_id();
$id_barang=$_GET['id_barang'];
$Jml=$_POST['jml'];
$harga=$_POST['harga'];
$tanggal=date("Y-m-d");

// Menghapus data
$sql = mysqli_query($connection, "SELECT id_barang FROM det_order WHERE id_barang='$id_barang' AND id_session='$_SESSION[pelanggan]'");

	$ketemu=mysqli_num_rows($sql);

	if ($ketemu==0){
		mysqli_query($connection,"INSERT INTO det_order (id_barang, jumlah, harga, id_session)
			VALUES('$id_barang','$Jml', $harga, '$sid')");
		} else {
			mysqli_query($connection,"UPDATE det_order
				SET jumlah = jumlah + 1
				WHERE id_session ='$sid' AND id_barang='$id_barang'");
		}
		header('Location:keranjang.php');
		?>