<?php
session_start ();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../../index.php><b>LOGIN</b></a></center>";
} else {
// untuk memasukkan file config.php dan file koneksi.php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
// untuk menangkap variabel 'ukuran' yang dikirim oleh form_tambah.php
    $ukuran = $_POST['ukuran'];
	$id_barang = $_POST['id_barang'];
	$stok = $_POST['stok'];
// query untuk menyimpan ke tabel tbl_ukuran
    $querySimpan = mysqli_query($connection, "INSERT INTO ukuran (id_barang, no_ukuran, kuantitas) VALUES ('$id_barang', '$ukuran', '$stok')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar ukuran
    if ($querySimpan) {
        echo "<script> alert('Data Ukuran Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=ukuran';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah ukuran
    } else {
        echo "<script> alert('Data Ukuran Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_ukuran';</script>";
    }
}

?>