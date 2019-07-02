
<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $kota = $_POST['id_kota'];
    $biaya=$_POST['biaya'];
    $queryEdit = mysqli_query($connection, "UPDATE ongkir SET id_kota='$kota' WHERE biaya='$biaya'");

    if ($queryEdit) {
        echo "<script> alert('Data Biaya Kirim Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=biaya';</script>";
    } else {
        echo "<script> alert('Data Kategori Gagal Masuk'); window.location = '$admin_url'+'adminweb.php?module=edit_biaya&id_ongkir='+'$idOngkir';</script>";

    }
}
?> 