<?php
session_start();
include "lib/koneksi.php";
$sid =session_id();
$id_barang=$_GET['id_barang'];
$tanggal=date("Y-m-d");

$sql = mysqli_query($connection, "SELECT id_barang FROM tb_order WHERE id_barang='$id_barang' AND id_session='$sid'");

if(isset($_REQUEST['aksi']) && isset($_REQUEST['id'])){
		if($_REQUEST['aksi']=='tambah'){
			if(isset($_SESSION['keranjang'][$_REQUEST['id']])){
				$_SESSION['keranjang'][$_REQUEST['id']] += 1;
			}else{
				$_SESSION['keranjang'][$_REQUEST['id']] = 1;
			}
		}
		else if($_REQUEST['aksi']=='ubah'){
			foreach($_REQUEST['id'] as $id=>$id_produk){
				$_SESSION['keranjang'][$id_produk] = $_REQUEST['jml'][$id_produk];
				if($_REQUEST['jml'][$id_produk]==0){
					unset($_SESSION['keranjang'][$id_produk]);}
				}
		}
		else if($_REQUEST['aksi']=='hapus'){
			unset($_SESSION['keranjang'][$_REQUEST['id']]);
		}
		else if($_REQUEST['aksi']=='kosongkan'){
			unset($_SESSION['keranjang']);
		}
	}

	$ketemu=mysqli_num_rows(mysqli_query($connection, $sql));

	if ($ketemu==0){
		mysqli_query($connection, "INSERT INTO tb_order (status_order, id_barang, jumlah, id_session)
			VALUES('P','$id_barang', 1, '$sid')");
		} else {
			mysqli_query($connection, "UPDATE tb_order
				SET jumlah = jumlah + 1
				WHERE id_session ='$sid' AND id_barang='$id_barang'");
		}
		header('Location:keranjang.php');
		?>