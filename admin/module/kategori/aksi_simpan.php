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
    $namaKategori = $_POST['namaKategori'];
// query untuk menyimpan ke tabel tbl_kategori
    $querySimpan = mysqli_query($connection, "INSERT INTO kategori (nama_kategori) VALUES ('$namaKategori')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
    if ($querySimpan) {
        echo "<script> alert('Data Kategori Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=kategori';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
    } else {
        echo "<script> alert('Data Kategori Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_kategori';</script>";
    }
}

?>