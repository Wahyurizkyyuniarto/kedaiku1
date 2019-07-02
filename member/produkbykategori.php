<?php 
include "template/header.php";
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
					
						<!--brands_products //// merk 
						<div class="brands_products">
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								<?php 
								$q=mysqli_query($connection, "SELECT * from tbl_merek");
								while($r=mysqli_fetch_array($q)){
								?>
									<li><a href="#"> <span class="pull-right"></span><?php echo $r['nama_merek'];?></a></li>
								<?php } ?>
								</ul>
							</div>
						</div> brands_products-->
				
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
							<?php
								$id_kat=$_GET['id_kategori']; 
								$q=mysqli_query($connection, "SELECT * FROM barang WHERE id_kategori=$id_kat");
								while($r=mysqli_fetch_array($q)){
								?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><img src="../admin/upload/<?php echo $r['gambar'];?>" alt="" /></a>
											<h2>Rp. <?php echo $r['harga'];?></h2>
											<p><a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><?php echo $r['nama_barang'];?></a></p>
											<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										
								</div>
								
							</div>
						</div>
						<?php } ?>
					</div><!--features_items-->
					
					
					
				</div>
			</div>
		</div>
	</section>

<?php
include "template/footer.php";
?>