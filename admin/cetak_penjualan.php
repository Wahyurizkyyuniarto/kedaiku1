<html>
<head></head>
<body>

<h4 align="center">LAPORAN DATA MEMBER<br>
TOKO SEPATU ANS STORE<br>
Jl. Anggajaya I/18A, Gejayan, Condong Catur, Sleman <br>
  YOGYAKARTA 55283<br>
  </h4>

  <!-- By nama Barang-->
  <!--<div id="container">
    
    <form action="cetak_produk_by_namabarang.php" method="get">
      <div class="form-group">
        <label>Nama Barang</label>
    <select name="nama_barang"> BY Nama Barang
      <?php 
      include"../lib/koneksi.php";

      $pilih=mysqli_query($connection, "SELECT * from barang ");
      while($row=mysqli_fetch_array($pilih)) {
        $nama_barang = strip_tags($row['nama_barang']);
  ?>
                <option value="<?php $nama_barang;?>"><?php echo $nama_barang; ?> </option>
                <?php } ?>

      </select>
      <input type="submit" value"ok" name="submit"/>
      </div>
    </form>
  </div>-->


  <!-- By nama pelnggan-->
  <!--<div id="container">
    
    <form action="cetak_produk_by_namabarang.php" method="get">
      <div class="form-group">
        <label>Nama Pelanggan</label>
    <select name="nama_barang"> BY pelanggan
      <?php 
      include"../lib/koneksi.php";

      $pilih=mysqli_query($connection, "SELECT * from pelanggan ");
      while($row=mysqli_fetch_array($pilih)) {
        $nama = strip_tags($row['nama']);
  ?>
                <option value="<?php $nama;?>"><?php echo $nama; ?> </option>
                <?php } ?>

      </select>
      <input type="submit" value"ok" name="submit"/>
      </div>
    </form>
  </div>-->

    <!-- By Date-->
  <!--<div id="container">
    
    <form action="cetak_produk_by_namabarang.php" method="get">
      <div class="form-group">
        <label>Date</label>
    <select name="nama_barang"> Date
      <?php 
      include"../lib/koneksi.php";

      $pilih=mysqli_query($connection, "SELECT * from tb_order  ");
      while($row=mysqli_fetch_array($pilih)) {
        $nama_barang = strip_tags($row['nama_barang']);
  ?>
                <option value="<?php $nama_barang;?>"><?php echo $nama_barang; ?> </option>
                <?php } ?>

      </select>
      <input type="submit" value"ok" name="submit"/>
      </div>
    </form>
  </div>-->


    <!-- By nMont-->
  <!--<div id="container">
    
    <form action="cetak_produk_by_namabarang.php" method="get">
      <div class="form-group">
        <label>Mont</label>
    <select name="nama_barang"> BY Mont
      <?php 
      include"../lib/koneksi.php";

      $pilih=mysqli_query($connection, "SELECT * from barang ");
      while($row=mysqli_fetch_array($pilih)) {
        $nama_barang = strip_tags($row['nama_barang']);
  ?>
                <option value="<?php $nama_barang;?>"><?php echo $nama_barang; ?> </option>
                <?php } ?>

      </select>
      <input type="submit" value"ok" name="submit"/>
      </div>
    </form>
  </div>-->





  
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
				  <!--<br>
				  <center><button onClick="window.print();">Print</button></center> 
				  </br>-->
				  <script>
				  window.print();
				  </script>
</body>
</html>