<?php   
 //session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else { ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajemen
            <small>Ukuran</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Ukuran</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tambah Ukuran</h3>
              </div>
			        <form class="form-horizontal" action="../admin/module/ukuran/aksi_simpan.php" method="post">
                  <div class="box-body">
					<div class="form-group">
					  <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
						<div class="col-sm-10">
						  <select class="form-control" id="id_barang" name="id_barang"><?php
						  include "../lib/koneksi.php";
						  $kueriBarang=mysqli_query($connection, "SELECT * from barang"); 
						  while($kat=mysqli_fetch_array($kueriBarang)){
						  ?>
						<option value="<?php echo $kat['id_barang'];?>"><?php echo $kat['nama_barang'];?></option>
						<?php } ?>
						</select>
					  </div>
					</div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Ukuran</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="Ukuran">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kuantitas</label>
                      <div class="col-sm-10">
					  <input type="text" class="form-control" id="stok" name="stok" placeholder="Kuantitas">
                      </div>
                    </div>
                 
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