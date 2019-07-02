<?php
/**
 * 
 * @package         APLIKASI WEB PENJUALAN UNTUK KULIAH E-COMMERCE
 * @description     Free Version
 * @version         1.0
 * @copyright       Copyright (c) 2016, Ika Nur Fajri
 * ==========================================================
 * =================== ABOUT DEVELOPER ======================
 * ==========================================================
 * License          Free Copy
 * Email            ika.nur.fajri@amikom.ac.id
 * Mobile           +62-98-638-673-204
 * ==========================================================
 * ==========================================================
 * Silakan Disempurnakan
**/
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKota = $_GET['id_kota'];
    $queryHapus = mysqli_query($connection, "DELETE FROM kota WHERE id_kota='$idKota'");
    if ($queryHapus) {
        echo "<script> alert('Data Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=kota';</script>";
    } else {
        echo "<script> alert('Data Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=kota';</script>";

    }
}
?>