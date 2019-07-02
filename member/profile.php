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
										<!--<li><a href="profile_alamat.php">Alamat</a></li> -->
										<li><a href="profile_password.php">Ubah Password</a></li> 
										
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
											
											<h4>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun<
											<p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p> <br>

											<form class="form-horizontal" action="profile_edit.php" method="post">

											<?php
								            $id_pelanggan=$_SESSION['pelanggan'];
								            $pilih=mysqli_query($connection, "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
								            while($tampil=mysqli_fetch_array($pilih))
								            {
								            	?>
 
							               	<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
						                      <div class="col-sm-10">
						                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?php echo $tampil['nama']; ?>"><br>
						                      </div> <br>


						                      <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
						                      <div class="col-sm-10">
						                        <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $tampil['username']; ?>"><br>
						                      </div>

						                      <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
						                      <div class="col-sm-10">
						                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?php echo $tampil['alamat']; ?>"><br>
						                      </div>

						                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						                      <div class="col-sm-10">
						                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $tampil['email']; ?>"><br>
						                      </div>

						                      <label for="inputEmail3" class="col-sm-2 control-label">Telepon</label>
						                      <div class="col-sm-10">
						                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Telepon" value="<?php echo $tampil['no_hp']; ?>"><br>
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