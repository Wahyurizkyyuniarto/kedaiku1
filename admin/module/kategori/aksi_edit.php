<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKategori = $_POST['id_kategori'];
    $namaKategori = $_POST['nama_kategori'];
    $queryEdit = mysqli_query($connection, "UPDATE kategori SET nama_kategori='$namaKategori' WHERE id_kategori='$idKategori'");

    if ($queryEdit) {
        echo "<script> alert('Data Kategori Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=kategori';</script>";
    } else {
        echo "<script> alert('Data Kategori Gagal Masuk'); window.location = '$admin_url'+'adminweb.php?module=edit_kategori&id_kategori='+'$idKategori';</script>";

    }
}
?>