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
                  
                      <th>Nama Pelanggan</th>
                      <th>Alamat</th>
                      <th>Email</th>
                      <th>Telepon</th>
 
                    </tr>
              <?php 
              include "../lib/config.php";
                  include "../lib/koneksi.php";

                  $ambil=mysqli_query($connection, "SELECT * FROM pelanggan ");
                  while($pilih=mysqli_fetch_array($ambil)){

              ?>  
                    <tr>
                      
                    <td><?php echo $pilih['nama'];?></td>
                    <td><?php echo $pilih['alamat'];?></td>
                    <td><?php echo $pilih['email'];?></td>
                    <td><?php echo $pilih['no_hp'];?></td>

                    <?php } ?>

                    </tr>

                  </table>
</body>
</html>