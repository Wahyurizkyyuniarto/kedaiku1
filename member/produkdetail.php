<?php 
include "template/header.php";
?>
<!-- Mulai COding Body -->	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Kategori</h2>
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
					<div class="product-details"><!--product-details-->
						<?php
						
								$q=mysqli_query($connection, "SELECT * FROM barang 
									WHERE id_barang='$_GET[id_barang]' 
									ORDER BY id_barang");
								while($r=mysqli_fetch_array($q)){
								?>
						<div class="col-sm-5">
							<div class="view-product">
								<img src="../admin/upload/<?php echo $r['gambar'];?>" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="../images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="../images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="../images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="../images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="../images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="../images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="../images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="../images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="../images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="../images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $r['nama_barang']; ?></h2>
								<p><?php echo $r['deskripsi']; ?></p>
								<img src="../images/product-details/rating.png" alt="" />
								<form action="sessi.php" method="post">
								<input type="hidden" name="kode" value="<?=$r['id_barang']; ?>" />
								<span>
									<span>Rp. <?php echo $r['harga'];?></span>
								</span>
								<p><b> Ukuran </b></p>
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<?php 
									$q=mysqli_query($connection, "SELECT * FROM ukuran join barang on barang.id_barang=ukuran.id_barang where barang.id_barang = $_GET[id_barang]");
									while($qr=mysqli_fetch_array($q)){
									?>
									  <label class="btn btn-secondary">
										<input required type="radio" name="jml" OnChange="resetjml()" value="<?php echo $qr['no_ukuran']; ?>" autocomplete="off" > <?php echo $qr['no_ukuran']; ?>
									  </label>
									<?php } ?>
								  <p><b> Kuantitas </b></p>
									  <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
									  <input name="jum" type="number" id="number" value="1" max="5" /> 
									  <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
								</div>
								<div class="form-group" style="margin-top:10px">
								<button type="submit" class="btn btn-fefault cart" style="margin-left:0px;border-radius:2px;">
										<i class="fa fa-shopping-cart"></i>
										Tambah ke Keranjang
								</button>
								</form>
								</div>
									<!-- 
									<p><label>Jumlah Barang:</label>
									<input type="hidden" name="kode" value="<?=$r['id_barang']?>" />
									<input type="number" min="1" max="5" /></p>
									<p><label>Ukuran:</label>
									<form action="" method="post"/>
									<input type="hidden" name="jml" value="<?=$r['no_ukuran']?>" />
									<input type="number" min="36" max="45" /></p>
									<p><label>Kuantitas:</label>
									<input type="hidden" name="txt" value="<?=$r['kuantitas']?>" />
									<input type="number" min="1" max="5" /></p>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Tambah ke Keranjang
									</button>
								</span></form> -->
								<p><b>Stok:</b> <?php echo $r['stok']; ?></p>
								<p><b>Kondisi:</b> Baru</p>
							 
								
							</div><!--/product-information-->
						</div>
						<?php } ?>
					</div><!--/product-details-->
					
					
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
													<img src="../admin/upload/<?php echo $r['gambar'];?>" alt="" />
													<h2>Rp. <?php echo $r['harga']; ?></h2>
													<p><a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><?php echo $r['nama_barang']; ?></p>
													<a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div> <?php } ?>
								</div>
								<div class="item">	
									<?php 
								$q=mysqli_query($connection, "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 3, 3");
								while($r=mysqli_fetch_array($q)){
								?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="../admin/upload/<?php echo $r['gambar'];?>" alt="" />
													<h2>Rp. <?php echo $r['harga']; ?> </h2>
													<p><a href="produkdetail.php?id_barang=<?php echo $r['id_barang'];?>"><?php echo $r['nama_barang']; ?></a> </p>
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