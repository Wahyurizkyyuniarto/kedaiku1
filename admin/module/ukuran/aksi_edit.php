<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
	
	$idUkuran = $_POST['id_ukuran'];
    $ukuran = $_POST['ukuran'];
	$id_barang = $_POST['id_barang'];
	$stok = $_POST['kuantitas'];
    $queryEdit = mysqli_query($connection, "UPDATE ukuran SET no_ukuran='$ukuran', id_barang='$id_barang', kuantitas='$stok' WHERE id_ukuran='$idUkuran'");

    if ($queryEdit) {
        echo "<script> alert('Data Ukuran Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=ukuran';</script>";
    } else {
        echo "<script> alert('Data Ukuran Gagal Masuk'); window.location = '$admin_url'+'adminweb.php?module=edit_ukuran&id_ukuran='+'$idUkuran';</script>";

    }
}
?>