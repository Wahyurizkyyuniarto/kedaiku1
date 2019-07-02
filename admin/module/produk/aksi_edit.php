<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login<br>";
	echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}else{
	include "../../../lib/config.php";
	include "../../../lib/koneksi.php";
	$id_barang = $_POST['id_barang'];
	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];

	
	$id_kategori= $_POST['id_kategori'];	
	$nama_barang= $_POST['nama_barang'];
	$deskripsi= $_POST['deskripsi'];
	$harga= $_POST['harga'];
	$stok = $_POST['stok'];

	$path="../../upload".$nama_file;

	if(empty($tmp_file)){
	$querySimpan = mysqli_query($connection, "UPDATE  barang SET id_kategori='$id_kategori', nama_barang='$nama_barang', deskripsi='$deskripsi',harga='$harga', stok='$stok'
	WHERE id_barang='$id_barang'");
	if($querySimpan){
		echo "<script> alert('Data Produk Berhasil Dirubah');window.location='$admin_url'+'adminweb.php?module=produk';</script>";
	}else{
		echo "<script> alert('Data Produk Gagal Dirubah'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
	}

	}else{
	if ($tipe_file=="image/jpeg" ||$tipe_file=="image/jpg"||$tipe_file=="image/png") {
		if ($ukuran_file<=10000000) {
			if (move_uploaded_file($tmp_file, $path)) {

	$querySimpan = mysqli_query($connection, "UPDATE  barang SET id_kategori='$id_kategori', nama_barang='$nama_barang', gambar='$nama_file', deskripsi='$deskripsi',harga='$harga', stok='$stok'
	WHERE id_barang='$id_barang'");
	if($querySimpan){
		echo "<script> alert('Data Produk Berhasil Dirubah');window.location='$admin_url'+'adminweb.php?module=produk';</script>";
	}else{
		echo "<script> alert('Data Produk Gagal Dirubah'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
	}
}else{
		echo "<script> alert('Data Gambar Gagal Dirubah'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
	}
}else{
			echo "<script> alert('Data Gambar Gagal Dirubah Karena Ukuran Melebihi 1 MB'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";
	}
}else{
			echo "<script> alert('Data Gambar Gagal Dirubah Karena Tidak Berekstensi JPG/JPEG/PNG'); window.location = '$admin_url'+'adminweb.php?module=tambah_produk';</script>";

}
	
}
}
?>