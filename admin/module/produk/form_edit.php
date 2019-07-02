<?php
	if(!isset($_SESSION))
		{
			session_start();
		} else {
	?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajemen
            <small>Produk</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Produk</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Produk</h3>
              </div>
              <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idBarang=$_GET['id_barang'];
              $queryEdit=mysqli_query($connection, "SELECT * FROM barang WHERE id_barang='$idBarang'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
              $idBarang=$hasilQuery['id_barang'];
              $nama_barang=$hasilQuery['nama_barang'];
              $deskripsi=$hasilQuery['deskripsi'];
              $harga=$hasilQuery['harga'];
              $stok=$hasilQuery['stok'];
			  
              ?>

			        <form class="form-horizontal" action="../admin/module/produk/aksi_edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_barang" value="<?php echo $idBarang; ?>">

                  <div class="box-body">

					<!-- form kategori -->
                        <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-10">
            
                      <select class="form-control" name="id_kategori">
                                <?php
                
                include "../config/koneksi.php";
				
                $kueriKategori= mysqli_query($connection, "SELECT * from kategori ORDER BY nama_kategori");
                while($kat=mysqli_fetch_array($kueriKategori)){
                	if ($hasilQuery['id_kategori']==$kat['id_kategori']){
                	echo "<option value=$kat[id_kategori] selected>$kat[nama_kategori]</option>";   
                }else{
                  	echo "<option value=$kat[id_kategori]>$kat[nama_kategori]</option>";   

                }
                        } ?>  

                      </select>
                    </div>
                    </div>
					<!-- end of form edit kategori -->
                     
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>">
                      </div>
                    </div>
                    <!--<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Ukuran</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="Ukuran" value="<?php echo $ukuran; ?>">
					  </div>
                    </div>-->
                          <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Gambar</label>
                      <div class="col-sm-10">
                      <?php echo "<input type='file' id='gambar' src='../../upload/$hasilQuery[gambar]' name='gambar'>";?>
                      </div>
                    </div>
                        <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Harga Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" value="<?php echo $harga; ?>">
                      </div>
                    </div>
                      <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Stok Barang</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" value="<?php echo $stok; ?>">
                      </div>
                    </div>  
					  
					<!--
					<div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Satuan</label>
      <div class="col-sm-10">
        <select class="form-control" name="satuanBarang">
        <option value="Unit" name="satuanBarang">Unit</option>
		<option value="Buah" name="satuanBarang">Buah</option>
         
          </select>
      </div>
    </div>  -->

					
					
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                   
                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
			</div>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>