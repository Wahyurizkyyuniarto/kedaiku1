<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idMerk = $_GET['id_merk'];
    $queryHapus = mysqli_query($connection, "DELETE FROM merk WHERE id_merk='$idMerk'");
    if ($queryHapus) {
        echo "<script> alert('Data merk Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=merk';</script>";
    } else {
        echo "<script> alert('Data merk Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=merk';</script>";

    }
}
?>