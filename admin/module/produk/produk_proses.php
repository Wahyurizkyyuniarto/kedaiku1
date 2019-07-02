<?php
require_once '../../config/koneksi.php';
require_once '../../config/fungsi.php';
if(isset($_POST['tambah']))
{
	$id_produk = kode_otomatis("barang","kode_barang","PR-",3,4);
	//cek nama produk sudah ada apa belum
	$sql_cek = sprintf("SELECT * FROM barang WHERE kode_barang='%s' AND nama_barang='%s'",
						mysqli_real_escape_string($id_produk),
						mysqli_real_escape_string($_POST['nama_barang']));
	$cek=mysqli_num_rows(mysqli_query($connection, $sql_cek));
	// Kalau nama kategori sudah ada
	if ($cek > 0){
		echo "<script>window.alert('Produk ".$_POST['nama_barang']." kategori ini sudah ada sebelumnya')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}else{
		//upload
		$lokasi_file    = $_FILES['gambar']['tmp_name'];
		$tipe_file      = $_FILES['gambar']['type'];
		$nama_file      = $id_produk.'.jpg'; 
		// Apabila ada gambar yang diupload
		if (!empty($lokasi_file)){		  
			if ($tipe_file != "image/jpeg" && $tipe_file != "image/pjpeg"){
				echo "<script>window.alert('Upload Gagal, Pastikan File Foto yang di Upload Bertipe *.JPG')</script>";
				//ARAHKAN
				echo "<script>window.location='javascript:history.go(-1)';</script>";
			}else {
				//buat folder
				if(is_dir("../uploaded/produk"))
				{
					$tempat_gambar = "../uploaded/produk";
				}else{
					mkdir("../uploaded/produk");
					$tempat_gambar = "../uploaded/produk";
				}
				UploadImage($nama_file, $tempat_gambar ,"gambar");
			}
		}else{
			$nama_file = "default.jpg";
		}
		
	/*$nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
	$path = "../uploaded/produk/" . $nama_file;

	if (move_uploaded_file($tmp_file, $path))
	*/
	
		//Menyimpan data produk
		$query = sprintf("INSERT INTO barang(kode_barang, kode_merek, kode_kategori, nama_barang, harga, gambar, deskripsi, stok) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
					mysqli_real_escape_string($id_produk),
					mysqli_real_escape_string($_POST['kode_merek']),
					mysqli_real_escape_string($_POST['kode_kategori']),
					mysqli_real_escape_string($_POST['nama_barang']),
					mysqli_real_escape_string($_POST['harga']),
					mysqli_real_escape_string($nama_file),
					mysqli_real_escape_string($_POST['deskripsi']),
					mysqli_real_escape_string($_POST['stok']));
					
		$sql = mysqli_query($connection, $query);
		if($sql)
		{
			echo "<script>alert('Data Produk Berhasil Disimpan')</script>";
			//arahkan
			echo "<script>window.location='../adminweb.php?hal=produk';</script>";	
		}else{
			echo "<script>alert('Data Produk Gagal Disimpan')</script>";
			//arahkan
			echo "<script>window.location='javascript:history.go(-1)';</script>";	
		}
	}
}else if(isset($_POST['ubah'])){
	//cek nama produk sudah ada apa belum
	$sql_cek = sprintf("SELECT * FROM barang WHERE kode_barang='%s' AND nama_barang <> '%s' ",
						mysqli_real_escape_string($_POST['kode_barang']),
						mysqli_real_escape_string($_POST['nama_barang']));
	$cek=mysqli_num_rows(mysqli_query($connection, $sql_cek));
	// Kalau nama produk sudah ada
	if ($cek > 0){
		echo "<script>window.alert('Produk ".$_POST['nama_barang']." kategori ini sudah ada sebelumnya')</script>";
		echo "<script>window.location='javascript:history.go(-1)';</script>";
	}else{
		//upload
		$lokasi_file    = $_FILES['gambar']['tmp_name'];
		$tipe_file      = $_FILES['gambar']['type'];
		$nama_file      = $_POST['kode_barang'].'.jpg'; 
		// Apabila ada gambar yang diupload
		if (!empty($lokasi_file)){		  
			if ($tipe_file != "image/jpeg" && $tipe_file != "image/pjpeg"){
				echo "<script>window.alert('Upload Gagal, Pastikan File Foto yang di Upload Bertipe *.JPG')</script>";
				//ARAHKAN
				echo "<script>window.location='javascript:history.go(-1)';</script>";
			}else {
				//buat folder
				if(is_dir("../uploaded/produk"))
				{
					$tempat_gambar = "../uploaded/produk";
				}else{
					mkdir("../uploaded/produk");
					$tempat_gambar = "../uploaded/produk";
				}
				UploadImage($nama_file, $tempat_gambar ,"gambar");
			}
			$status = TRUE;
		}else{
			$status = FALSE;
		}
		//Menyimpan data produk
		$query = sprintf("UPDATE barang SET kode_kategori = '%s', nama_barang = '%s', harga = '%s', stok = '%s' WHERE kode_barang = '%s'",
					
					mysqli_real_escape_string($_POST['kode_kategori']),
					mysqli_real_escape_string($_POST['nama_barang']),
					mysqli_real_escape_string($_POST['harga']),
					mysqli_real_escape_string($_POST['stok']),
					mysqli_real_escape_string($_POST['kode_barang']));
		$sql = mysqli_query($connection, $query);
		
		if($sql)
		{
			if($status)
			{
				mysqli_query(sprintf($connection, "UPDATE `barang` SET `gambar`='%s' WHERE kode_barang='%s'",
					mysqli_real_escape_string($nama_file),
					mysqli_real_escape_string($_POST['kode_barang'])));
			}
			echo "<script>alert('Data Produk Berhasil Diubah')</script>";
			//arahkan
			echo "<script>window.location='../adminweb.php?hal=produk';</script>";	
		}else{
			echo "<script>alert('Data Produk Gagal Diubah')</script>";
			//arahkan
			echo "<script>window.location='javascript:history.go(-1)';</script>";	
		}
		
	}
}else if(isset($_GET['hapus'])){
	//AMBIL GAMBAR
	$ambil = mysqli_fetch_array(mysqli_query($connection, "SELECT nama_barang, Gambar FROM barang WHERE kode_barang = '".$_GET['hapus']."'"));
	$query = sprintf("DELETE FROM barang WHERE kode_barang = '%s'",
					mysqli_real_escape_string($_GET['hapus']));
	$sql = mysqli_query($connection, $query);
	 if($sql)
	{
		//HAPUS FILE
		if(is_file("../admin/uploaded/produk/".$ambil['Gambar']) && $ambil['Gambar']!='default.jpg')
		{
			unlink("../admin/uploaded/produk/".$ambil['Gambar']);
			
		}
		echo "<script>alert('Data Produk $ambil[nama_barang] Berhasil Dihapus')</script>";
		//arahkan
		echo "<script>window.location='../adminweb.php?hal=produk';</script>";	
	}else{
		echo "<script>alert('Data Produk $ambil[nama_barang] Gagal Dihapus')</script>";
		//arahkan
		echo "<script>window.location='javascript:history.go(-1)';</script>";	
	}
}
?> 