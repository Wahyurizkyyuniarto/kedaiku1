<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<center>Untuk mengakses modul, Anda harus Login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";	
} else {
	//Load file koneksi php
	include "../../../config/config.php";
	include "../../../config/koneksi.php";

	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];

	$idKategori = $_POST['idKategori'];
	$idMerk = $_POST['idMerk'];
	$namaBarang = $_POST['namaBarang'];
	$deskripsi = $_POST['deskripsi'];
	$harga = $_POST['harga'];
	$slide = $_POST['slide'];
	$rekomendasi = $_POST['rekomendasi'];

	$path = "../../upload/".$nama_file;
	if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
		if ($ukuran_file <= 1000000) {
			if (move_uploaded_file($tmp_file, $path)) {
				$querySimpan = mysqli_query($connection, "INSERT INTO barang(id_kategori, id_merk, nama_barang, deskripsi, harga, gambar, slide, rekomendasi) VALUES('$idKategori','$idMerk','$namaBarang,'$deskripsi','$harga','$nama_file','$slide','$rekomendasi')");
				if ($querySimpan) {
					echo "<script> alert ('DATA PRODUK BERHASIL MASUK'); window.location = '$admin_url' + 'adminweb.php?module=produk';</script>";
				} else {
					echo "<script> alert ('DATA PRODUK GAGAL MASUK'); window.location = '$admin_url' + 'adminweb.php?module=tambah_produk';</script>";
				}
			} else {
				echo "<script> alert ('Data Gambar Produk Gagal Dimasukkan'); window.location = '$admin_url' + 'adminweb.php?module=tambah_produk';</script>";
			}
		} else {
			echo "<script> alert ('Data Gambar Produk Gagal Dimasukkan Karena Ukuran Melebihi 1 MB'); window.location = '$admin_url' + 'adminweb.php?module=tambah_produk';</script>";
		}
	} else {
		echo "<script> alert ('Data Gambar Produk Gagal Dimasukkan Karena Tidak Berekstensi JPG/JPEG/PNG'); window.location = '$admin_url' + 'adminweb.php?module=tambah_produk';</script>";
	}
}
?>