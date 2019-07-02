<?php
session_start ();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../../index.php><b>LOGIN</b></a></center>";
} else {
// untuk memasukkan file config.php dan file koneksi.php
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";
// untuk menangkap variabel 'namaKategori' yang dikirim oleh form_tambah.php
    $namaMerk = $_POST['nm_merk'];
// query untuk menyimpan ke tabel tbl_kategori
    $querySimpan = mysqli_query($connection, "INSERT INTO merk (nm_merk) VALUES ('$namaMerk')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar merk
    if ($querySimpan) {
        echo "<script> alert('Data Merk Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=merk';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah merk
    } else {
        echo "<script> alert('Data Merk Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_merk';</script>";
    }
}

?>