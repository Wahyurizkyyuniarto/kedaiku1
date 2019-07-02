<html>
<head></head>
<body>

	<h4 align="center">LAPORAN DATA MEMBER<br>
TOKO SEPATU ANS STORE<br>
Jl. Anggajaya I/18A, Gejayan, Condong Catur, Sleman <br>
  YOGYAKARTA 55283<br>
  </h4>

	<table border=1px width=80% align="center">
                    <tr>
	                
	                    <th>Kategori</th>
                      <th>Nama Barang</th>
	                    <th>Harga</th>
	                    <th>Stok</th>
	                    <th>Deskripsi</th>  
                    </tr>
      				<?php 
      				include "../lib/config.php";
                	include "../lib/koneksi.php";

                	$ambil=mysqli_query($connection, "SELECT * FROM barang b 
                    JOIN kategori k ON b.id_kategori=k.id_kategori 
                    ORDER BY k.nama_kategori");
                	while($pilih=mysqli_fetch_array($ambil)){

      				?>	
                    <tr>
                    	
                    <td><?php echo $pilih['nama_kategori'];?></td>
                    <td><?php echo $pilih['nama_barang'];?></td>
                    <td><?php echo $pilih['harga'];?></td>
                    <td><?php echo $pilih['stok'];?></td>
                    <td><?php echo $pilih['deskripsi'];?></td>
                    <?php } ?>

                    </tr>

                  </table>
</body>
</html>