<?php 
include "template/header.php";
?>

	<section id="cart_items">
		<div class="container">
		<div class="breadcrumb">
			<ol class="breadcrumb">
			<li><a href="#">Home</li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						$sql = mysqli_query($connection,"SELECT * FROM tb_order");
						while ($d=mysqli_fetch_array($connection, $sql)) {
							$subtotal = $d ['harga']* $d['jumlah'];
							?>
							<tr>
								<td class="cart_product">
									<a href=""><img src="../admin/upload/<?php echo $d['gambar'];?>" alt=""></a> 
								</td>
								<td class="cart_description">
									<h4><a href=""><?php echo $d['nama_barang'];?></a></h4>
								</td>
								<td class="cart_price">
									<p><?php echo $d['harga'];?></p>
								</td>
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
<br>
<br>
<?php
include "template/footer.php";
?>