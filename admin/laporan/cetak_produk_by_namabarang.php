<html>
<head></head>
<body>

	<h4 align="center">LAPORAN DATA PENJUALAN<br>
PANTI ASUHAN BINA SIWI<br>
Kompleks Balai Desa Sendangsari Pajangan Bantul <br>
  YOGYAKARTA 55751<br>
  Telp(0247)7169031, 081227688816, 081328016593, 081328021736<br>

<!-- by nama barang -->

  <!-- By nama Barang-->
  cetak_produk_by_namabarang.php

  
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
      				include "../lib/config.php";
                	include "../lib/koneksi.php";

                	$ambil=mysqli_query($connection, "SELECT * from tb_order t
                  JOIN det_order o ON t.id_order=o.id_order
                  JOIN barang b ON o.id_barang=b.id_barang
                  JOIN kategori k ON b.id_kategori=k.id_kategori
                  JOIN pelanggan p ON t.id_pelanggan=p.id_pelanggan");
                	while($pilih=mysqli_fetch_array($ambil)){

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