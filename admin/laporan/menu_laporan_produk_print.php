				<h3 align="center">Laporan Produk</h3>
					<h4 align="center">Tanggal : <?php 
						$date = date("d-m-Y"); 
					 echo "$date"; ?></h4>
					<hr />
					<br />
<?php
$id_produka = $_POST['id_produka'];
							$pilih_form = mysql_query("SELECT * FROM kain k JOIN kategori a ON k.id_kategori=a.id_kategori WHERE id_kain='$id_produka' LIMIT 1");
							while($tampil_form = mysql_fetch_array($pilih_form)){
					?>
					<form class="form-horizontal" role="form"  action="aksi.php?menu=admin&act=tambah" method="POST">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label"><p align="left">Id Kain</p></label>
							<div class="col-sm-4">
								<p>: <?php echo "$tampil_form[id_kain]"; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label"><p align="left">Nama</p></label>
							<div class="col-sm-4">
								<p>: <?php echo "$tampil_form[nama_kain]"; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label"><p align="left">Kategori</p></label>
							<div class="col-sm-4">
								<p>: <?php echo "$tampil_form[nama_kategori]"; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label"><p align="left">Harga @meter</p></label>
							<div class="col-sm-4">
								<p>: <?php echo "$tampil_form[harga_meter]"; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label"><p align="left">Gambar</p></label>
							<div class="col-sm-4">
								<p>: <img class="img-responsive  col-lg-12" src="../images/images_produk/<?php echo $tampil_form['gambar']; ?>" alt="" /></p>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label"><p align="left">Keterangan</p></label>
							<div class="col-sm-4">
								<p>: <?php echo "$tampil_form[keterangan]"; ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label"><p align="left">Status</p></label>
							<div class="col-sm-4">
								<p>: <?php echo "$tampil_form[status]"; ?></p>
							</div>
						</div>
						<br /><br /><br /><br />
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-10 control-label"><p align="right">Alamat, tanggal</p></label>
						</div>
						<br /><br />
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-10 control-label"><p align="right"><?php echo "$_SESSION[nama]"; ?></p></label>
						</div>
					</form>	
					
					
					<form>
						<input class="noPrint" type="button" value="Print" onclick="window.print()">
					</form>
					<?php
						}
					?>