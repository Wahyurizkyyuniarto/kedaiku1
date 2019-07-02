<?php
include "template/header.php";
//include "pages/main.php";
//include "template/footer.php";
?>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<?php 
								$q=mysqli_query($connection, "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 1");
								while($r=mysqli_fetch_array($q)){
								?>
								<div class="col-sm-6">
									<h1><span>ANS STORE</span> Shoes </h1>
									<h2><a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><?php echo $r['nama_barang']; ?></a></h2>
									<p><?php echo $r['deskripsi']; ?> </p>
									<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><button type="button" class="btn btn-default get"onclick="window.location = 'produkdetail.php?id_barang=<?php echo $r['id_barang'];?>'">Get it now</button></a>
								</div>
								<div class="col-sm-6">
									<img src="admin/upload/<?php echo $r['gambar'];?>" class="girl img-responsive" alt="" />
									
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
								<?php } ?>
							</div>
							<div class="item">
								<?php 
								$q=mysqli_query($connection, "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 1,1");
								while($r=mysqli_fetch_array($q)){
								?>
								<div class="col-sm-6">
									<h1><span>ANS STORE</span> Shoes </h1>
									<h2><a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><?php echo $r['nama_barang']; ?></a></h2>
									<p><?php echo $r['deskripsi']; ?> </p>
									<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><button type="button" class="btn btn-default get" onclick="window.location = 'produkdetail.php?id_barang=<?php echo $r['id_barang'];?>'">Get it now</button></a>
								</div>
								<div class="col-sm-6">
									<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><img src="admin/upload/<?php echo $r['gambar'];?>" class="girl img-responsive" alt="" /></a>
									
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
								<?php } ?>
							</div>
							
							<div class="item">
								<?php 
								$q=mysqli_query($connection, "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 2,1");
								while($r=mysqli_fetch_array($q)){
								?>
								<div class="col-sm-6">
									<h1><span>ANS STORE</span> Shoes </h1>
									<h2><a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><?php echo $r['nama_barang']; ?></a></h2>
									<p><?php echo $r['deskripsi']; ?> </p>
									<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><button type="button" class="btn btn-default get" onclick="window.location = 'produkdetail.php?id_barang=<?php echo $r['id_barang'];?>'">Get it now</button></a>
								</div>
								<div class="col-sm-6">
									<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><img src="admin/upload/<?php echo $r['gambar'];?>" class="girl img-responsive" alt="" /></a>
									
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
								<?php } ?>
							</div>
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
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
					
						
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
							<?php 
								$q=mysqli_query($connection, "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 6");
								while($r=mysqli_fetch_array($q)){
								?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><img src="admin/upload/<?php echo $r['gambar'];?>" alt="" /></a>
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
					</div><!--features_items-->
					
					
					<!-- Category Tab -->
					<!--/category-tab-->
					<!--/category-tab-->
					



					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Latest items</h2>
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<?php 
								$q=mysqli_query($connection, "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 3");
								while($r=mysqli_fetch_array($q)){
								?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><img src="admin/upload/<?php echo $r['gambar'];?>" alt="" /></a>
													<h2>Rp. <?php echo $r['harga']; ?></h2>
													<p><a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><?php echo $r['nama_barang']; ?></a></p>
													<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div> <?php } ?>


								</div>
								<div class="item">	
									<?php 
								$q=mysqli_query($connection, "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 3,3");
								while($r=mysqli_fetch_array($q)){
								?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><img src="admin/upload/<?php echo $r['gambar'];?>" alt="" /></a>
													<h2>Rp. <?php echo $r['harga']; ?> </h2>
													<p><a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>">Rp. <?php echo $r['nama_barang']; ?> </a></p>
													<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									 <?php } ?>
								
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>

<?php
include "template/footer.php";
?>