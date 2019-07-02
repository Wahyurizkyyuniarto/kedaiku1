<?php 
$sid = session_id();
include "template/header.php";
error_reporting(0);
?>
	<section id="cart_items">
		<div class="container">
<?php
	$ses_total = $_SESSION['ses_total'];
	$ses_kode  = $_SESSION['ses_kode'];
	$ses_jum   = $_SESSION['ses_jum'];
	$ses_jml   = $_SESSION['ses_jml'];
	?>
		<!-- menampilkan data keranjang -->
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Deskripsi</td>
							<td class="price">Harga</td>
							<td class="size">Ukuran</td>
							<td class="quantity">Jumlah barang</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
						$no=0;
						for ($i=0; $i < $ses_total; $i++) {
							if ($ses_kode[$i]=='') continue;
							$sql = mysqli_query($connection,"SELECT * FROM barang WHERE id_barang='$ses_kode[$i]'");
							$produk=mysqli_fetch_array($sql);
							$no++;
							$sberat = $produk['berat']*$ses_jum[$i];
							$stotal = $produk['harga']*$ses_jum[$i];
							$berat += $sberat;
							$total += $stotal;
							?>
							<tr>
								<td class="cart_description">
									<h4><a href=""><?=$produk['nama_barang']?></a></h4>
								</td>
								<td class="cart_price">
									<p>Rp. <?=$produk['harga']?></p>
								</td>
								<td><?=$ses_jml[$i]?></td>
								<td><?=$ses_jum[$i]?> item(s)</td>
								<td>Rp <?=$stotal?></td>

								<td class="cart_delete">
									<a class="cart_quantity_delete" href="sessi.php?sts=delete&kode=<?=$ses_kode[$i]?>" onclick="return confirm('Yakin akan menghapus ?')"><i class="fa fa-times"></i></a>
								</td>
							</tr>
					<?php	} ?>
					</tbody>
							<tr>
							  <td></td>
							  <td colspan="3">Total</td>
							  <td>Rp. <?=$total?></td>
							  <td></td>
							</tr>
				</table>
			</div>
		
			<div class="form-group col-md-12">
			<a href="produk.php"><button class="btn btn-success btn-lg">Pesan Lagi </button></a> 
			<a href="sessi.php?&sts=clear"><button class="btn btn-success btn-lg" onclick="return confirm('Yakin transaksi akan dibatalkan?')">Batal</button></a> 
			<a href="<?=$link?>" onclick="return confirm('Yakin transaksi akan disimpan?')"><button class="btn btn-success btn-lg">Proses Pemesanan</button></a>			
			</div>
		
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Proses Pemesanan</h2>
						<form method="post" action="simpan.php" required/>
							<input type="text" name="ttl" value="<?=$total?>" required/>
							<input type="text" name="ttl_b" value="<?=$berat?>" required/>
						*) Ongkos Kirim
							<select name="ongkos" required>
							<?php
							$sql2 = mysqli_query($connection,"SELECT * FROM ongkir");
							while($rsk=mysqli_fetch_array($sql2)){
								echo"<option value=$rsk[id_ongkir]>$rsk[kota] - $rsk[biaya]</option>";
							}
							?>
							</select>
						*) Nama Pemesan
							<input type="text" name="nama" placeholder="Nama Pemesan" value="<?=$_SESSION['namapel']?>" required/>
						*) Nama Penerima
							<input type="text" name="nama_p" placeholder="Nama Penerima" required/>
						*) Alamat Penerima
							<input type="text" name="almt_p" placeholder="Alamat Penerima" required/>
						*) Telepon Penerima
							<input type="text" name="telp_p" placeholder="Telepon Penerima" required/>
							<button type="submit" class="btn btn-default">Simpan Transaksi</button>
						</form>
					</div><!--/sign up form-->
				</div>
		
		
		</div>
	</section>

<?php
include "template/footer.php";
?>