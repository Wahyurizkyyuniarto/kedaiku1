<html>
<head></head>
<body>

	<h4 align="center">LAPORAN DATA MEMBER<br>
TOKO SEPATU ANS STORE<br>
Jl. Anggajaya I/18A, Gejayan, Condong Catur, Sleman <br>
  YOGYAKARTA 55283<br>
  </h4>

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


                	$ambil=mysqli_query($connection, "SELECT * from pelanggan where nama='".$_GET['nama']."'");
                	while($pilih=mysqli_fetch_array($ambil)){

      				?>	
                    <tr>
                    <td><?php echo $pilih['id_pelanggan']; ?></td>
                      <td><?php echo $pilih['nama']; ?></td>
                      <td><?php echo $pilih['alamat']; ?></td>
                      <td><?php echo $pilih['email'];?></td>
                      <!--<td><?php echo $pilih['harga'];?></td>
                      <td><?php echo $pilih['stok'];?></td> -->
                    <?php } ?>

                    </tr>

                  </table>
</body>
</html>