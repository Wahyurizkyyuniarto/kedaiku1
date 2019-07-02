<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<center>Untuk mengakses modul, Anda harus Login <br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";	
} else {
	//Load file koneksi php
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";

	


	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];

	$id_kategori= $_POST['id_kategori'];
	$nama_barang = $_POST['nama_barang'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$deskripsi = $_POST['deskripsi'];
	$berat = $_POST['berat'];

	$path = "../../upload/".$nama_file;
	if ($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") {
		if ($ukuran_file <= 1000000) {
			if (move_uploaded_file($tmp_file, $path)) {
				
				$querySimpan = mysqli_query($connection, "INSERT INTO barang(id_kategori, 
					nama_barang, 
					harga, 
					stok, 
					deskripsi, 
					berat,  
					gambar) 
					VALUES('$id_kategori',
					'$nama_barang',
					'$harga',
					'$stok',
					'$deskripsi',
					'$berat',
					'$nama_file')");
				
				if ($querySimpan) {
					echo "<script> alert ('DATA PRODUK BERHASIL MASUK'); window.location = '$admin_url' + 'adminweb.php?module=produk';</script>";
				} else {
					echo "<script> alert ('DATA PRODUK GAGAL MASUK eror'); window.location = '$admin_url' + 'adminweb.php?module=tambah_produk';</script>";
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