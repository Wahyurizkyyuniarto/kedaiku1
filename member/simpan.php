<!-- PROSES PEMESANAN -->

<?php 
	session_start();
	//error_reporting(0);
	
	require_once('../lib/koneksi.php');
	
	$ses_total = $_SESSION['ses_total'];
	$ses_kode  = $_SESSION['ses_kode'];
	$ses_jum   = $_SESSION['ses_jum'];
	$ses_jml   = $_SESSION['ses_jml'];
	//$ses_txt   = $_SESSION['ses_txt'];
	
	/*function cr_ongkir($kd){
    $sql3=mysqli_query($connection, "SELECT biaya from ongkir where id_ongkir='".$kd."'");
    $tempe3=mysqli_fetch_assoc($sql3);

    return $tempe3['biaya'];
	}*/
	
	//variabel
	$id_member = $_SESSION['pelanggan'];
	$ttl=$_POST['ttl'];
	$provinsi_id= $_POST['provinsi'];
	$kabupaten = $_POST['kabupaten'];
	$berat=$_POST['ttl_b'];
	$ongkir=$_POST['ongkos'];
	$nama=$_POST['nama'];
	$nama_p=$_POST['nama_p'];
	$almt_p=$_POST['almt_p'];
	$telp_p=$_POST['telp_p'];
	
	    $sql3=mysqli_query($connection, "SELECT biaya from ongkir where id_ongkir='".$ongkir."'");
    $tempe3=mysqli_fetch_assoc($sql3);

	//biaya
	$ttl_o=$tempe3['biaya']*$berat;
	$sub_total=$ttl+$ttl_o;
	
	//echo $sub_total;
	$alamat=$provinsi_id."," .$kabupaten."," .$almt_p;
	
	
  $sql=mysqli_query($connection,"INSERT into tb_order (id_order, tgl_order, id_ongkir, id_pelanggan, alamat_penerima, nama_penerima, telepon_penerima, status_order, berat, total) 
  values ('',now(),'$ongkir','$id_member','$alamat','$nama_p','$telp_p','Pesan','$berat','$sub_total')");
  //$query=mysqli_query($connection,$sql);
  
  $id_in=mysqli_insert_id($connection);
  
for ($i=0; $i < $ses_total; $i++) {
	if ($ses_kode[$i]=='') continue;
		$kode = $ses_kode[$i];
		$jum = $ses_jum[$i];
		$jml = $ses_jml[$i];
		//$txt = $ses_txt[$i];
	//echo $jum;
	//echo $kode;
		
	$sql2=mysqli_query($connection,"select harga from barang where id_barang='$kode'");
	$rs=mysqli_fetch_assoc($sql2);
	$hrg=$rs['harga'];
	
  mysqli_query($connection,"insert into det_order(id_order,id_barang,jumlah,ukuran,harga) 
  values ('$id_in','$kode','$jum','$jml','$hrg')");
  //echo $id_in;
  //echo $kode;
  //echo $jum; 
  
  //kurangi stok
  mysqli_query($connection,"update barang set stok=stok-$jum where id_barang='$kode'");
  
	}
  
  if ($sql) {
	
	# hapus keranjang belanja 	
	for ($i=0; $i<$_SESSION['ses_total']; $i++) {
		unset($_SESSION['ses_kode'][$i]);
		unset($_SESSION['ses_jum'][$i]);
		unset($_SESSION['ses_jml'][$i]);
	//	unset($_SESSION['ses_txt'][$i]);
	}
	$_SESSION['ses_total'] = 0;	
	
    echo '
    <script type="text/javascript">
      alert("berhasil input pemesanan, Segera lakukan konfirmasi pembayaran TERIMA KASIH");
      window.location="index.php";
    </script>

    ';
  } else {
    echo '
    <script type="text/javascript">
      alert("gagal input pemesanan = '.$sql.'");
	        window.location="proses_pesan.php";
    </script>

    ';
  }	
  
?>