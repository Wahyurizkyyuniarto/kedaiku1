<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $IDPengiriman = $_POST['id_pengiriman'];
	$nomerresi=$_POST['no_resi'];
	$tglpengirim=$_POST['tanggal_pengiriman'];
    $queryEdit = mysqli_query($connection, "UPDATE pengiriman SET no_resi='$nomerresi', tanggal_pengiriman='$tglpengirim', WHERE id_pengiriman='$IDPengiriman'");

    if ($queryEdit) {
        echo "<script> alert('Data Pengiriman Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=pengiriman';</script>";
    }else {
        echo "<script> alert('Data Kategori Gagal Masuk'); window.location = '$admin_url'+'adminweb.php?module=edit_pengiriman&id_pengiriman='+'$IDPengiriman';</script>";

    }
}
?>