<?php 
$sid = session_id();
include "template/header.php";

?>


	<section id="cart_items">
		<div class="container">
		<div class="breadcrumb">
			<ol class="breadcrumb">
			<li><a href="index.php">Home</li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>



		<!-- menampilkan data keranjang -->
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>


					<?php
						$sql = mysqli_query($connection, "SELECT * FROM tb_order, barang WHERE
							tb_order.id_session='$sid' AND tb_order.id_barang=barang.id_barang");
						while ($d=mysqli_fetch_array($sql)) {
							$subtotal = $d ['harga']* $d['jumlah'];
							?>

							<tr>
								<td class="cart_product">
									<a href=""><img src="admin/upload/<?php echo $produk['gambar'];?>" alt=""></a> 
								</td>
								<td class="cart_description">
									<h4><a href=""><?php echo $produk['namad_barang'];?></a></h4>
								</td>
								<td class="cart_price">
									<p><?php echo ['harga'];?></p>
								</td>

								<td><input type="text" class="span1" name="jml[<?php echo $produk['id_barang'];?>]" value="<?php echo $jml;?>" size="4" /> item(s)</td>
								<td>Rp <?php echo $produk['harga']*$jml;?></td>

								<td class="cart_delete">
									<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
								</td>
							</tr>
					<?php	} ?>
					</tbody>
				</table>
			</div>
		
		</div>
	</section>

<?php
include "template/footer.php";
?>