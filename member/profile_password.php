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
										<!--<li><a href="product-details.php">Alamat</a></li> -->
										<li><a href="checkout.php">Ubah Password</a></li> 
										
                                    </ul>
                                </li> 
                                <li class="menu"><a href="history_transaksi.php">History Transaksi</a>
                                </li>

							</ul>
						</div>




						

					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Profil Ku</h2>

						<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-left">
											
											<h4>Ubah Password</h4>
											<p> Untuk keamanan akun Anda, mohon untuk tidak menyebarkan password Anda ke orang lain.</p> <br>

											<form class="form-horizontal" action="profile_password_edit.php" method="post">

											<?php
								            $id_pelanggan=$_SESSION['pelanggan'];
								            $pilih=mysqli_query($connection, "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
								            while($tampil=mysqli_fetch_array($pilih))
								            {
								            	?>
 
							               	<label for="inputEmail3" class="col-sm-4 control-label">Password Saat ini</label>
						                      <div class="col-sm-8">
						                        <input type="Password" class="form-control" id="password" name="password" placeholder="password saat ini"><br>
						                      </div> <br>


						                      <label for="inputEmail3" class="col-sm-4 control-label">password yang baru</label>
						                      <div class="col-sm-8">
						                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password baru"><br>
						                      </div>

						                      <label for="inputEmail3" class="col-sm-4 control-label">konfirm password</label>
						                      <div class="col-sm-8">
						                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Re enter password baru"><br>
						                      </div>

						                      
						                      <!--<span><?php echo $tampil['alamat'];?></span> -->
						                   

							                <?php } ?>


											<div class="box-footer">
                   
						                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
						                  </div><!-- /.box-footer -->
						              </form>
										
								</div>
								
							</div>
				
					
					</div><!--features_items-->


<?php
include "template/footer.php";
?>