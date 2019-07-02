<html>
<head></head>
<body onload=window.print() align="center">

	<h4 align="center">LAPORAN DATA MEMBER<br>
TOKO SEPATU ANS STORE<br>
Jl. Anggajaya I/18A, Gejayan, Condong Catur, Sleman <br>
  YOGYAKARTA 55283<br>
  </h4>

	<table border=2px width=80% align="center">
                    <tr>
	                 
	                    <th>Nama Admin</th>
	                    <th>Username</th>
	                    <th>Email</th>
	                   
                    </tr>
      				<?php 
      				include "../lib/config.php";
                	include "../lib/koneksi.php";

                	$ambil=mysqli_query($connection, "SELECT * FROM admin");
                	while($pilih=mysqli_fetch_array($ambil)){

      				?>	
                    <tr>
                    
                    <td><?php echo $pilih['nama'];?></td>
                    <td><?php echo $pilih['username'];?></td>
                    <td><?php echo $pilih['email'];?></td>
                    
                    <?php } ?>

                    </tr>

                  </table>
                  
</body>
</html>