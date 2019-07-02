<?php
if(!empty($_SESSION[pelanggan])){
	$pelanggan = $_SESSION['pelanggan'];
	$row = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM pelanggan WHERE id_pelanggan='$pelanggan' "));
?>
<h5 class="title-bg" align="center">
   <small>Detail Produk</small>
</h5>

<div id="clientCarousel" class="carousel slide no-margin">
    <!-- Carousel items -->
    <div class="carousel-inner">
    	<div class="active item">
	<?php
		if(!empty($_SESSION['keranjang'])){
	?>
	<!--untuk menampilkan data -->
			<div class=" table-responsive">
	<form method="post" action="cobaongkir.php">
  		<table class="table-bordered text-align-center" width="100%">
  			<tr>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Sub Total</th>
			</tr>
			<?php
  				$total = 0;
				foreach($_SESSION['keranjang'] as $id_barang=>$jml){
				$produk	= mysqli_fetch_array(mysqli_query($connection, "SELECT id_barang, nama_barang, harga FROM barang WHERE id_barang='$id_barang'"));
				$total	+= $produk['harga']*$jml;
  			?>
  				<input type="hidden" name="id[<?php echo $produk['id_barang'];?>]" value="<?php echo $produk['id_barang'];?>" />
  			<tr>
			    <td><?php echo $produk['nama_barang'];?></td>
    			<td>Rp <?php echo angka($produk['harga']);?></td>
			    <td><?php echo $jml;?> item(s)</td>
			    <td>Rp <?php echo angka($produk['harga']*$jml);?></td>
  			</tr>
			  <?php
				 }
  				?>
  			<tr>
			  	<th colspan="2"></th>
    			<th>Tota All</th>
    			<th>Rp <?php echo angka($total);?></th>
  			</tr><tr>
  				<td colspan="4">
				<hr />
    				<table width="100%" align="center" bgcolor="#FFF" cellpadding="2" cellspacing="4">
    					<tr>
					      	<td width="30%">Nama Penerima</td>
      						<td width="70%"><input type="text" name="nama_penerima" value="<?php echo $row['nama'];?>" /></td>
    					</tr><tr>
					      <td>No Tlp</td>
    					  <td><input type="text" name="telepon_penerima" value="<?php echo $row['no_hp'];?>" /></td>
    					</tr>
    					
    					
						
					    <tr valign="top">
					      <td>Alamat Kota</td>
					      <td>
						   <select name="kota" id="kota" class="form-control" required>
									
									<?php
									$ambila   = mysqli_query($connection, "SELECT * FROM ongkir"); //sql buat mengambil data
									while($oa = mysqli_fetch_array($ambila)){
									?>
										<option value="<?php echo $oa['kota']; ?>" class="form-control"><?php echo $oa['kota']; ?></option>
									<?php
									}
									?>
								</select>
						  
						  </td>
						  
    					</tr>
						
						<tr>
					      	<td width="30%">Alamat Lengkap</td>
      						<td width="70%"><input type="text" name="alamat_penerima" value="<?php echo $row['alamat_penerima'];?>" /></td>
    					</tr>
					  </table>
    				</td>
  					</tr><tr>
  						<th colspan="4"><button type="submit" title="Checkout" class="button btn-cart"><span><span>Finish Order</span></span></button></th>
  					</tr>
  				</table>
			</form>
			</div>
			
      	</div>
	</div>
</div>
<?php
}else{
	echo "<script>window.location='?menu=keranjang_belanja';</script>";	
}
}
?>