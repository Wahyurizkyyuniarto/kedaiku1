<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idPengiriman = $_GET['id_pengiriman'];
    $queryHapus = mysqli_query($connection, "DELETE FROM pengiriman WHERE id_pengiriman='$idPengiriman'");
    if ($queryHapus) {
        echo "<script> alert('Data Pengiriman Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=pengiriman';</script>";
    } else {
        echo "<script> alert('Data Pengiriman Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=pengiriman';</script>";

    }
}
?>