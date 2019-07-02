<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKategori = $_GET['id_kategori'];
    $queryHapus = mysqli_query($connection, "DELETE FROM kategori WHERE id_kategori='$idKategori'");
    if ($queryHapus) {
        echo "<script> alert('Data Kategori Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=kategori';</script>";
    } else {
        echo "<script> alert('Data Kategori Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=kategori';</script>";

    }
}
?>