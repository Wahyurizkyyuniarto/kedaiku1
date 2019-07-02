<?php
include "template/header.php";
//include "pages/main.php";
//include "template/footer.php";
?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->		
						<?php 
						$q=mysqli_query($connection, "SELECT * from kategori");
						while($r=mysqli_fetch_array($q)){
						?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="produkbykategori.php?id_kategori=<?php echo $r['id_kategori'];?>"><?php echo $r['nama_kategori'];?></a></h4>
								</div>
							</div>
							<?php } ?>
						</div><!--/category-products-->
					
						<!--brands_products 
						<div class="brands_products">
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								<?php 
								$q=mysqli_query($connection, "SELECT * from tbl_merek");
								while($r=mysqli_fetch_array($q)){
								?>
									<li><a href="produkbymerek.php?id_merek=<?php echo $r['id_merek'];?>"> <span class="pull-right"></span><?php echo $r['nama_merek'];?></a></li>
								<?php } ?>
								</ul>
							</div>
						</div>   /brands_products-->
				
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
							<?php 
								$q=mysqli_query($connection, "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 12");
								while($r=mysqli_fetch_array($q)){
								?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><img src="../admin/upload/<?php echo $r['gambar'];?>" alt="" /></a>
											<h2>Rp. <?php echo $r['harga'];?></h2>
											<h3><a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><?php echo $r['nama_barang'];?></h3>
											<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
										<!-- <div class="product-overlay">
											<div class="overlay-content">
												<h2>Rp. <?php echo $r['harga'];?></h2>
												<p><a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><?php echo $r['nama_barang'];?></a></p>
												<a href="aksi_keranjang.php?id_barang=<?php echo $r['id_barang'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div> -->

								</div>


								<!-- wishlist dan compare
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div> -->

							</div>
						</div>
						<?php } ?>
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li class="active"><a href="">2</a></li>
							<li class="active"><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
					
					
					<!-- Category Tab -->
					<!--/category-tab-->
					<!--/category-tab-->
					

					
				</div>
			</div>
		</div>
	</section>

<?php
include "template/footer.php";
?>