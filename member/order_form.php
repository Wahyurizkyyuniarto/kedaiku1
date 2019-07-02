<?php 

session_start();
extract($_POST);

include "lib/koneksi.php";

if($mode =="beli")
{
	if(empty($item))
	{
		session_register("item");
		session_register("jumlah");
	}
	$item[$id_barang]=$id_barang;
	header("location:order_form.php");
}

elseif($mode=="hapus")
{
	unset($item[$order_hapus]);
	unset($jumlah[$order_hapus]);
	header("location:order_form.php");
}

elseif (isset($pesan_lagi)) 
{
	foreach ($item as $idx => $id_beli) 
	{
		$jumlah[$idx]=$jml_beli[$idx];
	}
	header("location:index.php")
}

elseif (isset($proses)) 
{
	foreach ($item as $idx => $id_beli) 
	{
		$jumlah[$idx]=$jml_beli[$idx];
	}
	header("location:order_confirm.php");
}

elseif (isset($batal)) 
{
	session_destroy();
	header("location:index.php")
}