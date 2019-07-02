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
    
	//$idPengiriman = $_POST['id_pengiriman'];
    $idKonfirmasi = $_POST['id_konfirmasi'];
    $tgl = $_POST['tanggal_pengiriman'];
    $status = $_POST['status_pengiriman'];
    $no_resi = $_POST['no_resi'];
// query untuk menyimpan ke tabel tbl_kategori
    $querySimpan = mysqli_query($connection, "INSERT INTO pengiriman (tanggal_pengiriman, id_konfirmasi, status_pengiriman, no_resi) 
        VALUES ('$tgl', '$idKonfirmasi', '$status', '$no_resi')");


    //$update = mysqli_query($connection, "UPDATE tb_order SET status_order='Dikirim' WHERE konfirmasi.id_konfirmasi=$idKonfirmasi ");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar kategori
    if ($querySimpan) {
        echo "<script> alert('Data pengiriman Berhasil Masuk'); window.location = '$admin_url'+'adminweb.php?module=pengiriman';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
    } else {
        echo "<script> alert('Data pengiriman Gagal Dimasukkan'); window.location = '$admin_url'+'adminweb.php?module=tambah_pengiriman';</script>";
    }
}

?>