
<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idOngkir = $_GET['id_ongkir'];
    $queryHapus = mysqli_query($connection, "DELETE FROM ongkir WHERE id_ongkir='$idOngkir'");
    if ($queryHapus) {
        echo "<script> alert('Data Biaya Kirim Berhasil Dihapus'); window.location = '$admin_url'+'adminweb.php?module=biaya';</script>";
    } else {
        echo "<script> alert('Data Biaya Kirim Gagal Dihapus'); window.location = '$admin_url'+'adminweb.php?module=biaya';</script>";

    }
}
?>