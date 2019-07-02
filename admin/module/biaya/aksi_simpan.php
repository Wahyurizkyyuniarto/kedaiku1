<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $kota = $_POST['id_kota'];
    $biaya = $_POST['biaya'];

    $querySimpan = mysqli_query($connection, "INSERT INTO ongkir (id_kota, biaya) VALUES ('$kota','$biaya')");
    if ($querySimpan) {
        echo "<script> alert('Data Biaya Kirim Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=biaya';</script>";
        //echo "masuk";
    } else {
        echo "<script> alert('Data Biaya Kirim Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_biaya';</script>";
    }
}
?>