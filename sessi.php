<?php
	
	session_start();

	require_once('lib/koneksi.php');

	if (!isset($_SESSION['ses_total'])) $_SESSION['ses_total']=0; 

	if ($_REQUEST['sts']==='clear') {
		for ($i=0; $i<$_SESSION['ses_total']; $i++) {
			unset($_SESSION['ses_kode'][$i]);
			unset($_SESSION['ses_jum'][$i]);
			unset($_SESSION['ses_jml'][$i]);
			unset($_SESSION['ses_txt'][$i]);
		}
		$_SESSION['ses_total'] = 0;			
	
	} else if ($_REQUEST['sts']==='delete') {
		for ($i=0; $i<$_SESSION['ses_total']; $i++) {
			if ($_REQUEST['kode']===$_SESSION['ses_kode'][$i]) {
				unset($_SESSION['ses_kode'][$i]);
				unset($_SESSION['ses_jum'][$i]);
				unset($_SESSION['ses_jml'][$i]);
				unset($_SESSION['ses_txt'][$i]);
			break;
			}
		}
	
	} else if (isset($_POST['kode'])) {
		$cari=mysqli_query($connection, "select * from barang where id_barang='".$_POST['kode']."'");
		$cek=mysqli_fetch_assoc($cari);
		$st=$cek['stok'];

		for ($i=0; $i<$_SESSION['ses_total']; $i++) {
		if ($_POST['jum'] >$st) {
			echo "<script>alert('Mohon maaf. Stok barang tidak mencukupi!');window.history.back();</script>";
			exit;
		}
		}
	
		if ($_REQUEST['sts']==='edit') {
			for ($i=0; $i<$_SESSION['ses_total']; $i++) {
				if ($_POST['kode']===$_SESSION['ses_kode'][$i]) {
					$_SESSION['ses_jum'][$i] = $_POST['jum'];
					$_SESSION['ses_jml'][$i] = $_POST['jml'];
					$_SESSION['ses_txt'][$i] = $_POST['txt'];
					break;
				}
			}		
		
		} else {
			$ada = false;
			for ($i=0; $i<$_SESSION['ses_total']; $i++) {
				if ($_POST['kode']===$_SESSION['ses_kode'][$i]) {
					$_SESSION['ses_jum'][$i] += $_POST['jum'];
					$_SESSION['ses_jml'][$i] = $_POST['jml'];
					$_SESSION['ses_txt'][$i] = $_POST['txt'];
					$ada = true;
					break;
				}
			}
			
			if (!$ada) {
				$_SESSION['ses_kode'][$_SESSION['ses_total']]= $_POST['kode'];
				$_SESSION['ses_jum'][$_SESSION['ses_total']] = $_POST['jum'];
				$_SESSION['ses_jml'][$_SESSION['ses_total']] = $_POST['jml'];
				$_SESSION['ses_txt'][$_SESSION['ses_total']] = $_POST['txt'];				
				$_SESSION['ses_total']++;
			}
		}
	}

	header("location:keranjang_new.php");

?>