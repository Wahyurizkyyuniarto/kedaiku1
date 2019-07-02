<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $id_konfirmasi = $_GET['id_konfirmasi'];
    $queryHapus = mysqli_query($connection, "DELETE FROM konfirmasi WHERE id_konfirmasi='$id_konfirmasi'");
    if ($queryHapus) {
        echo "<script> alert('Data Konfirmasi Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=konfirmasi';</script>";
    } else {
        echo "<script> alert('Data Konfirmasi Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=konfirmasi';</script>";

    }
}
?>