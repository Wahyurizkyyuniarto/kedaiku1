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
						<h2 class="title text-center">History Transaksi</h2>
<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">ID Pesan</td>
							<td align="center" class="description">Nama Barang</td>
							<td align="center" class="description">Ukuran</td>
							<td align="center" class="price">Harga</td>
							<td align="center" class="quantity">Jumlah Barang</td>
							<td align="center" class="total">Biaya Ongkir</td>
							<td align="center" class="total">Total</td>
							<td align="center" class="Status">Status Pesan</td>
							<td align="center" class="act">Aksi</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						
						$sql = mysqli_query($connection,"SELECT * FROM tb_order t
							JOIN pelanggan p ON t.id_pelanggan=p.id_pelanggan 
							JOIN det_order o ON t.id_order=o.id_order 
							JOIN barang b ON o.id_barang=b.id_barang
							WHERE t.id_pelanggan='$_SESSION[pelanggan]'");
						while ($d=mysqli_fetch_array($sql)) {
							?>
							<tr>
								<td class="cart_description">
									<p align="center"><?php echo $d['id_order'];?></p>
								</td>
								<td class="cart_description">
									<p align="center"><?php echo $d['nama_barang'];?></p>
								</td>
								<td class="cart_description">
									<p align="center"><?php echo $d['ukuran'];?></p>
								</td>
								<td class="cart_price">
									<p align="center"><?php echo $d['harga'];?></p>
								</td>
								<td class="cart_price">
									<p align="center"><?php echo $d['jumlah'];?></p>
								</td>
								<td class="cart_price">
									<p align="center"><?php echo $d['id_ongkir'];?></p>
								</td>
								<td class="cart_price">
									<p align="center"><?php $total = $d['harga']*$d['jumlah'] ; echo $total ;?></p>
								</td>
								<td class="cart_price">
									<p align="center"><?php echo $d['status_order']; 
										$sts=$d['status_order'];
									?></p>
								</td>
								<?php 
								if ($sts=='Pesan'){ ?>
								<td>
									<a href="konfirmasi.php?id_order=<?php echo $d['id_order'];?>">Konf</a>
								
								</td>

								<?php }else{ ?>
								<td>
									-

									<td>
								<?php } ?>
							</tr>
					<?php	} ?>
					</tbody>
				</table>
			</div>
		</div>
</div>
<div class="col-sm-9 col-md-offset-3 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">History Transaksi Sukses</h2>
<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">ID Pesan</td>
							<td align="center" class="description">Nama Barang</td>
							<td align="center" class="description">Ukuran</td>
							<td align="center" class="description">No Resi</td>
							<td align="center" class="price">Harga</td>
							<td align="center" class="quantity">Jumlah Barang</td>
							<td align="center" class="total">Biaya Ongkir</td>
							<td align="center" class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						
						$sql = mysqli_query($connection,"SELECT * FROM tb_order t JOIN pelanggan p ON t.id_pelanggan=p.id_pelanggan 
							JOIN det_order o ON t.id_order=o.id_order 
							JOIN barang b ON o.id_barang=b.id_barang
                            join konfirmasi k ON o.id_order=k.id_order
                            join pengiriman pe ON k.id_konfirmasi=pe.id_konfirmasi
							WHERE t.id_pelanggan='$_SESSION[pelanggan]'");
						while ($d=mysqli_fetch_array($sql)) {
							?>
							<tr>
								<td class="cart_description">
									<p align="center"><?php echo $d['id_order'];?></p>
								</td>
								<td class="cart_description">
									<p align="center"><?php echo $d['nama_barang'];?></p>
								</td>
								<td class="cart_description">
									<p align="center"><?php echo $d['ukuran'];?></p>
								</td>
								<td class="cart_description">
									<p align="center"><?php echo $d['no_resi'];?></p>
								</td>
								<td class="cart_price">
									<p align="center"><?php echo $d['harga'];?></p>
								</td>
								<td class="cart_price">
									<p align="center"><?php echo $d['jumlah'];?></p>
								</td>
								<td class="cart_price">
									<p align="center"><?php echo $d['id_ongkir'];?></p>
								</td>
								<td class="cart_price">
									<p align="center"><?php $total = $d['total']+$d['id_ongkir'] ; echo $total ;?></p>
								</td>
							</tr>
					<?php	} ?>
					</tbody>
				</table>
			</div>
		</div>
</div>
</div>
</section>
<br>
<br>

<?php
include "template/footer.php";
?>