<?php

include "template/header.php";
?>

<!-- Start from here MUNNNNNAAAA -->
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<button type="submit" class="btn btn-default get" onclick="window.location='login.php'">Login</button>
			<div class="register-req">
				<p>Anda Harus login terlebih dahulu</p>
				
			</div><!--/register-req-->

<!-- form checkout -->
			<div class="shopper-informations">
				<div class="row">

					<div class="col-sm-8 clearfix">
						<div class="bill-to">

							<p>Bill To</p>
							<div class="form-one">


								<form method="post">
									<input type="text" placeholder="Nama Penerima" name="nama_penerima" id="nama_penerima">
									<input type="text" placeholder="No Telepon" name="telepon_penerima" id="telepon_penerima">
									<input type="textarea" placeholder="Alamat Penerima" name="alamat_penerima" id="alamat_penerima">
									
								</form>
							</div>
							<div class="form-two">

								<form method="post">
									<input type="text" placeholder="Zip / Postal Code *">
									<!--<input type="text" placeholder="Nama Penerima" name="nama_penerima">
									<input type="text" placeholder="No Telepon" name="telepon_penerima"> -->
									<select>
										<option>-- State / Province / Region --</option>
										<option>Yogyakarta</option>
										<option>Kebumen</option>
										<option>Purworejo</option>
										<option>Semaarang</option>
										<option>Jakarta</option>
										<option>Bandung</option>
										<option>Tangerang</option>
										<option>Cilegon</option>
									</select>
									<select>
										<?php 
										include "lib/koneksi.php";
										$querikota=mysqli_query($connection, "SELECT * FROM ongkir");
										while ($kota=mysqli_fetch_array($querikota)) {
											?>
										<option><?php echo $kota['kota']; ?> </option>
										<?php } ?>
									</select>
									
									
								</form>


							</div>
							


						</div>
					</div>

					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<!--<label><input type="checkbox"> Shipping to bill address</label> -->
						</div>	
					</div>

					<div class="checkout-options">
				
					<ul class="nav">
					<li>
						<button type="reset" class="btn btn-default get" onclick="window.location='checkout.php'">Cancel</button>
					</li>
					<li>
						<button type="submit" class="btn btn-default get" onclick="window.location='selesai.php'">Continue</button>
					</li>
				</ul>
			</div><!--/checkout-options-->				
				</div>
			</div>
			<!-- END of form checkout -->


			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<?php

	$ses_total = $_SESSION['ses_total'];
	$ses_kode  = $_SESSION['ses_kode'];
	$ses_jum   = $_SESSION['ses_jum'];
	?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
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
							$total += $stotal;
							?>

							<tr>
								<td class="cart_description">
									<h4><a href=""><?=$produk['nama_barang']?></a></h4>
								</td>
								<td class="cart_price">
									<p>Rp. <?=$produk['harga']?></p>
								</td>

								<td><?=$ses_jum[$i]?> item(s)</td>
								<td>Rp <?=$stotal?></td>

								<td class="cart_delete">
									<a class="cart_quantity_delete" href="sessi.php?sts=delete&kode=<?=$ses_kode[$i]?>" onclick="return confirm('Yakin akan menghapus ?')"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							

					<?php	} ?>
												<tr>
							  <td></td>
							  <td colspan="2">Total</td>
							  <td>Rp. <?=$total?></td>
							  <td></td>
							</tr>
					</tbody>
				</table>
			</div>

			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->






<?php 
include "template/footer.php";
?>