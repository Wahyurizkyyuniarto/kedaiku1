<!-- konfirmasi -->

<?php 
	session_start();
	//error_reporting(0);
	
	require_once('../lib/koneksi.php');

	
	//variabel


	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];
	
	$id_order=$_POST['id_order'];
	$total_kirim=$_POST['total_kirim'];
	$no_rek=$_POST['no_rek'];
	$atas_nama=$_POST['atas_nama'];
	$tgl_transfer=$_POST['tgl_transfer'];
	//$bukti=$_POST['bukti'];
	



	//untuk Total Kirim
	if(is_numeric($total_kirim)==FALSE OR empty($total_kirim)){
		echo "<script>alert('Tolong Di Perhatikan Form Total Kirim')</script>";
		echo "<script language=javascript>window.history.go(-1);</script>";
		exit;
	}
	//untuk No Rekening
	elseif(is_numeric($no_rek)==FALSE OR empty($no_rek)){
		echo "<script>alert('Tolong Di Perhatikan Form No Rekening')</script>";
		echo "<script language=javascript>window.history.go(-1);</script>";
		exit;
	}
	elseif(!preg_match("([a-z0-9])",$atas_nama) OR empty($atas_nama)){
		echo "<script>alert('Tolong Di Perhatikan Form Atas Nama')</script>";
		echo "<script language=javascript>window.history.go(-1);</script>";
		exit;
	}
	//untuk bukti
												//untuk masalah foto
	//mengatur foto
	//if($_GET['act']=="tambah"){

	$path = "../images/images_konfirmasi/".$nama_file;
	if ($tipe_file == "image/jpeg" || $tipe_file == "image/jpg" || $tipe_file == "image/png") {
		if ($ukuran_file <= 1000000) {
			if (move_uploaded_file($tmp_file, $path)) {

		//sql input database
		  $input = mysqli_query($connection, "INSERT INTO konfirmasi (
										
										id_order,
										total_kirim,
										no_rekening,
										atas_nama,
										tanggal_transfer,
										gambar)
								VALUES (
								
										'$id_order',
										'$total_kirim',
										'$no_rek',
										'$atas_nama',
										'$tgl_transfer',
										'$nama_file')");
		$update = mysqli_query($connection, "UPDATE tb_order SET 
											status_order	= 'DIkonfirmasi'
									WHERE id_order	= '$id_order'");
		if (! $input){
			echo mysqli_error();
			echo "<script>alert('Penyimpanan Data gagal dilaksanakan.')</script>";
			echo "<script language=javascript>window.history.go(-1);</script>";
		}
		else{
			echo "<script>alert('Penyimpanan Data berhasil dilaksanakan. ');
			window.location=history_transaksi.php</script>"; 
		
		}
	}
}
}
	

		echo "<meta http-equiv='refresh'content='0;url=history_transaksi.php'>";
		

   
 
?>