<?php
session_start();
include "lib/koneksi.php";

$id_order=session_id();
$id_barang=$_GET['id_barang'];
$Jml=$_POST['jml'];
$harga=$_POST['harga'];


// Menghapus data
$act=(isset($_REQUEST['act']) ) ? $_REQUEST['act'] : "";
if(isset($_POST['submit']) AND is_numeric($Jml)){




if (isset($menu) AND $_GET['act']=='hapus'){
	
	//untuk menghapus data keranjang belanja
		$id_order	= strip_tags($_GET['id_order']);
		$id_barang		= strip_tags($_GET['id_barang']);
  		
			$hapus=mysqli_query($connection, "DELETE FROM det_order WHERE id_order='$id_pemesanan' AND id_barang='$id_barang'");
	
  
  
  if (!$hapus){
     echo "<script>alert('HAPUS GAGAL')</script>";
    }
  else{
     echo "<script>alert('Data Berhasil Di Hapus')</script>";
    }
     echo "<meta http-equiv='refresh'content='0;url=index.php?menu=$menu'>";
}


elseif ($menu=='keranjang_belanja' ){
	if(isset($_REQUEST['act']) && isset($_REQUEST['id'])){
		if($_REQUEST['act']=='tambah'){
			if(isset($_SESSION['keranjang'][$_REQUEST['id']])){
				$_SESSION['keranjang'][$_REQUEST['id']] += 1;
			}else{
				$_SESSION['keranjang'][$_REQUEST['id']] = 1;
			}
		}
		else if($_REQUEST['act']=='ubah'){
			foreach($_REQUEST['id'] as $id=>$id_produk){
				$_SESSION['keranjang'][$id_produk] = $_REQUEST['jml'][$id_produk];
				if($_REQUEST['jml'][$id_produk]==0){
					unset($_SESSION['keranjang'][$id_produk]);}
				}
		}
		else if($_REQUEST['act']=='hapus'){
			unset($_SESSION['keranjang'][$_REQUEST['id']]);
		}
		else if($_REQUEST['act']=='kosongkan'){
			unset($_SESSION['keranjang']);
		}
	}
//ARAHKAN
echo "<script>window.location='index.php?menu=keranjang_belanja';</script>";

}

?>
