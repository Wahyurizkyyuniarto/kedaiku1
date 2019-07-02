<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $size = $_GET['id_ukuran'];
    $queryHapus = mysqli_query($connection, "DELETE FROM ukuran WHERE id_ukuran='$size'");
    if ($queryHapus) {
        echo "<script> alert('Data Ukuran Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=ukuran';</script>";
    } else {
        echo "<script> alert('Data Ukuran Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=ukuran';</script>";

    }
}
?>