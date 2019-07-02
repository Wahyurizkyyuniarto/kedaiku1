<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idMerk = $_POST['id_merk'];
    $namaMerk = $_POST['nm_merk'];
    $queryEdit = mysqli_query($connection, "UPDATE merk SET nm_merk='$namaMerk' WHERE id_merk='$idMerk'");

    if ($queryEdit) {
        echo "<script> alert('Data merk Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=merk';</script>";
    } else {
        echo "<script> alert('Data merk Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=edit_merk&id_merk='+'$idKategori';</script>";

    }
}
?>