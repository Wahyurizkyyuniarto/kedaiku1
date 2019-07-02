<html>
<head></head>
<body>

	<h4 align="center">LAPORAN DATA PENJUALAN<br>
PANTI ASUHAN BINA SIWI<br>
Kompleks Balai Desa Sendangsari Pajangan Bantul <br>
  YOGYAKARTA 55751<br>
  Telp(0247)7169031, 081227688816, 081328016593, 081328021736<br>
  tanggal: </h4>


<?php
//lakukan koneksi ke MySQL
    include "../../lib/config.php";
    include "../../lib/koneksi.php";

//lakukan query select
?>
<table border=1px width=80% align="center">
                    <tr>
	                    <th>Tanggal</th>
	                    <th>Nama Barang</th>
	                    <th>Kategori</th>
	                    <th>Jumlah</th>
	                    <th>Pembeli</th>
                      <th>Dikirim Ke</th>  
                    </tr>  
                    <?php 
		$ambil = mysqli_query($connection, "SELECT * FROM tb_order t 
			JOIN barang b ON t.id_barang=b.id_barang
			JOIN pelanggan p ON t.id_pelanggan=p.id_pelanggan
			JOIN det_order d ON t.id_order=d.id_order
			JOIN kategori k ON b.id_kategori=k.id_kategori
			JOIN ongkir o ON t.id_ongkir=o.id_ongkir
			WHERE tgl_order BETWEEN '".$_POST['tgl_awal']."' AND '".$_POST['tgl_akhir']."' ");
		echo $ambil;
		while($pilih = mysqli_fetch_assoc($ambil)){


?>

                    <tr>
                    <td><?php echo $pilih['tgl_order']; ?></td>
                      <td><?php echo $pilih['nama_barang']; ?></td>
                      <td><?php echo $pilih['nama_kategori']; ?></td>
                      <td><?php echo $pilih['jumlah'];?></td>
                      <td><?php echo $pilih['nama'];?></td>
                      <td><?php echo $pilih['alamat_penerima'];?></td>
               <?php } ?>

                    </tr>

                  </table>
</body>
</html>