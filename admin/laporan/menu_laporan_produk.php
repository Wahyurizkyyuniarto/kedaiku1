<?php

if(empty($_GET['act'])){						//jika "$_GET['act']" kosong maka diisi "default"
	$_GET['act'] = "default";
}
switch($_GET['act'] ){
  // Tampil daftar produk
  default:										//case default menampilkan tampilan awal
  $p      = new Paging;							//memanggil fungsi paging dari file "config/class_paging.php"
  $batas  = 8;									//menentukan berapa yang akan ditampilkan
  $posisi = $p->cariPosisi($batas);				//mengisikan class 'cariPosisi' dengan berdasar batas '$batas'
  
  //jika tidak cari
  if( !empty($_GET['id_produk'])){
  	$cari	= "";
	}
  //bila mencari data		
  else{
  	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
 	$cari	= strip_tags($_POST['cari']);
  }
  
  //jika $cari tidak memiliki isi
  if(empty($cari)){
  	$ambil   = mysql_query("SELECT * FROM kain k JOIN kategori a ON k.id_kategori=a.id_kategori ORDER BY id_kain DESC LIMIT $posisi,$batas"); //sql buat mengambil data
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kain"));			//menghitung jumlah data
  }
  //jika mencari data
  else{
  	$ambil   = mysql_query("SELECT * FROM kain k JOIN kategori a ON k.id_kategori=a.id_kategori WHERE nama LIKE '%$cari%' OR harga_meter LIKE '%$cari%' OR keterangan LIKE '%$cari%' OR status LIKE '%$cari%'  ORDER BY id_kategori DESC LIMIT $posisi,$batas"); //sql buat mengambil data
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kategori WHERE nama LIKE '%$cari%' OR harga_meter LIKE '%$cari%' OR keterangan LIKE '%$cari%' OR status LIKE '%$cari%' "));			//menghitung jumlah data
  }
  
  
    $no = $posisi+1;							//menghitung no urut ditampilkan
    $no1=0;										//menentukan nilai default $no1 = 0
	
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);											//mengisi class "jumlahHalaman" dengan berdasarkan '$jmldata' & '$batas'
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);								//mengisi class navHalaman dengan berdasarkan '$_GET['halaman']' & '$jmlhalaman'
?>
                <!-- Blog Post -->

                <!-- Comments Form -->
                <div class="well">
                    <h3 align="center">Laporan Produk</h3>
					<h4 align="center">Tanggal : <?php 
						$date = date("d-m-Y"); 
					 echo "$date"; ?></h4>
					<hr />
					<br />
					<?php
						//bila edit data
						if( !empty($_GET['id_produka'])){
							$id_produka = $_GET['id_produka'];
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
					<form class="form-horizontal" role="form"  action="print.php?menu=laporan_produk_print&act=tambah" method="POST" target="_blank">
						<input type="hidden" name="id_produka" id="id_produka" value="<?php echo "$tampil_form[id_kain]"; ?>"/>
						<input type="Submit" value="print"/>
					</form>
					<?php
							}
						}
						//bila tidak meng edit
						else{	
					?>
					<!--untuk menampilkan data -->
					<div class=" table-responsive">
						<table class="table-bordered text-align-center" width="100%">
							<tr align="center" >
								<th ><p align="center">#</p></th>
								<th ><p align="center">Id</p></th>
								<th ><p align="center">Nama</p></th>
								<th ><p align="center">Kategori</p></th>
								<th ><p align="center">Harga @meter</p></th>
								<th ><p align="center">Keterangan</p></th>
								<th ><p align="center">Status</p></th>
								<th ><p align="center">Preview</p></th>
							</tr>
							<?php
								$no=1;
								//untuk mengolah data
								while($oa = mysql_fetch_array($ambil)){	
							?>
							<tr>
								<td> <?php echo $no; ?></td>
								<td> <?php echo $oa['id_kain']; ?></td>
								<td> <?php echo $oa['nama_kain']; ?></td>
								<td> <?php echo $oa['nama_kategori']; ?></td>
								<td> <?php echo $oa['harga_meter']; ?></td>
								<td> <?php echo $oa['keterangan']; ?></td>
								<td> <?php echo $oa['status']; ?></td>
								<td align="center"><a href="tampil.php?menu=laporan_produk&id_produka=<?php echo $oa['id_kain']; ?>"><button type="button" class="btn btn-default">Preview</button></a></td>
							</tr>
							<?php
								$no++;
								}
							?>
						</table>
					</div><!-- /.table-responsive -->	
					<?php
						}
					?>
					
	  			</div> 
				
				<!--paging -->
				<div class="col-lg-3 tengah">
					<div class="btn-toolbar " role="toolbar" style="margin-left: 0px;">
						<div class="btn-group">
						<?php
							if ( $jmlhalaman ==1){
								echo "";
							}
							else{
								echo "$linkHalaman";
							}
						?>
					</div>
				</div>
			</div>
			<!--end paging -->


                <hr />
<?php
  break;
  
}
?>
                