<?php 
include "template/header.php";
?>



	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2><?php echo"$_SESSION[namauser]";?></h2>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<!--<li><a href="index.php" class="active">AKun Saya</a></li> -->
								<li class="mainmenu"><a href="profile.php">Akun Saya<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="profile.php">profil</a></li>
										<li><a href="profile_alamat.php">Alamat</a></li> 
										<li><a href="profile_password.php">Ubah Password</a></li> 
										
                                    </ul>
                                </li> 
                                <li class="menu"><a href="history_transaksi.php">History Transaksi</a>
                                </li>

							</ul>
						</div>




						

					</div>
				</div>
				<!-- FROM HERE PRINCESS ----- -->
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Konfirmasi Pembayaran</h2>


						


						<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-left">
											<?php

								            $ambil=mysqli_query($connection, "SELECT * FROM tb_order WHERE id_pelanggan='$_SESSION[pelanggan]' AND status_order='Pesan' AND id_order='$_GET[id_order]' ");
								            while($tampil=mysqli_fetch_assoc($ambil)) {
								            	$itung = mysqli_num_rows($ambil);
								            	if($itung>=1){
													$ttl=$tampil['total']+$tampil['id_ongkir'];
								            		?>
											<h4>
											<p>Konfirmasi pembayaran dengan foto bukti transfer</p> <br>
											<p>Konfirmasi Pesanan : </p>
											<p><b>ID Pemesanan : <?php echo "$tampil[id_order]";?></b></p>
											<p><b>Total kirim : <?php echo "$ttl";?></b></p>
											<p><b>Rekening :  604201013967532 a/n Wahyu Rizky Yuniarto</b></p>

										<div class="table table-responsive">
											<table class="table table-bordered">
												
											
								            
								            <?php } ?>
 
							               
											<!--sign up form-->
												<h2>Form Konfirmasi</h2>
												<form method="post" action="simpan_konfi.php" enctype="multipart/form-data">
												<div class="form-group" style="padding:5px; ">
													<label for="inputEmail3" class="col-sm-3 control-label">No Rekening</label>
													<div class="col-sm-7">
														<input type="hidden" class="form-control" id="id_order" name="id_order" placeholder="Id Ordder" value="<?php echo "$_GET[id_order]"; ?>">
														<input type="hidden" class="form-control" id="total_kirim" name="total_kirim" value="<?php echo "$ttl";?>">
														<input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="Nomor Rekening" required>
													</div>
												</div>
												<div class="form-group" style="padding:5px; ">
													<label for="inputEmail3" class="col-sm-3 control-label">Atas Nama</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" id="atas_nama" name="atas_nama" placeholder="Atas Nama" required>
													</div>
												</div>
												<div class="form-group" style="padding:5px; ">
													<label for="inputEmail3" class="col-sm-3 control-label">Tanggal transfer</label>
													<div class="col-sm-7">
														<input type="date" class="form-control" id="tgl_transfer" name="tgl_transfer" placeholder="Tanggal Transfer" required>
													</div>
												</div>
												<div class="form-group" style="padding:5px; ">
													 <label for="inputEmail3" class="col-sm-3 control-label">Gambar</label>
								                      <div class="col-sm-7">
								                      <input type="file" id="gambar" name="gambar"/>
								                      <p class="help-block">Gambar untuk bukti.
														<br />
														<img class="img-responsive" src="../images/images_konfirmasi/<?php echo $tampil_form['gambar']; ?>" alt="" /></p>
								                      </div>
								                    </div>
												</div>
												 <div class="box-footer">
                   
						                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
						                  </div><!-- /.box-footer -->
						              </form>

											</div><!--/sign up form-->
				
						                  

							                <?php } ?>
							            </table>
							        </div>


									
										
								</div>
								
							</div>
				
					
					</div><!--features_items-->

<br><br>
<?php
include "template/footer.php";
?>