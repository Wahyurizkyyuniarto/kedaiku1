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
            <small>Pesanan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Pesanan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tambah Pesanan</h3>
              </div>
			        <form class="form-horizontal" action="../admin/module/pesanan/aksi_simpan.php" method="post" enctype="multipart/form-data">
                  <div class="box-body">
    <!--  //tambahkan disini -->
						<div class="form-group">
					  <label for="inputEmail3" class="col-sm-2 control-label">Nama Pelanggan</label>
					  <div class="col-sm-10">
					  <select class="from-control" name="id_pelanggan">
							<?php
				include "../lib/koneksi.php";
				$kueriBiaya= mysqli_query($connection, "SELECT * from pelanggan");
				while ($pelanggan=mysqli_fetch_array($kueriBiaya)){
				?>
						<option value="<?php echo $pelanggan['id_pelanggan']; ?>"><?php echo $pelanggan['nama']; ?></option>
				  <?php } ?>
						</select>
					  </div>
					  </div>
					  
					  <div class="form-group">
                       <label for="inputEmail3" class="col-sm-2 control-label">Status Order</label>
                       <div class="col-sm-10">
                      <div class="radio">
                        <label>
                          <input type="radio" name="status" id="status" value="Y">
                         Waiting
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="status" id="status" value="N">
                          Done
                        </label>
                      </div>
                   </div>
                    </div> 
					  
				  
				  <div class="form-group">
						      <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Order</label>
						      <div class="col-sm-10">
						      <input type="date" class="form-control" id="tgl" name="tgl" placeholder="tgl">
                  </div>
                  </div>
				  <div class="form-group">
						      <label for="inputEmail3" class="col-sm-2 control-label">Total</label>
						      <div class="col-sm-10">
						      <input type="text" class="form-control" id="total" name="total" placeholder="total">
                  </div>
                  </div>
<!--trial biaya kirim -->
<!--kota-->
                  <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Kota</label>
            <div class="col-sm-10">
            <select class="from-control" name="kota">
              <?php
        include "../lib/koneksi.php";
        $kueriBiaya= mysqli_query($connection, "SELECT * from kota");
        while ($kota=mysqli_fetch_array($kueriBiaya)){
        ?>
            <option value="<?php echo $kota['id_kota']; ?>"><?php echo $kota['nama_kota']; ?></option>
          <?php } ?>
            </select>
            </div>
            </div>
<!--jasa-->
             <!--<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jasa</label>
            <div class="col-sm-10">
            <select class="from-control" name="jasa">
              <?php
        include "../lib/koneksi.php";
        $kueriBiaya= mysqli_query($connection, "SELECT * from jasa");
        while ($jasa=mysqli_fetch_array($kueriBiaya)){
        ?>
            <option value="<?php echo $jasa['id_jasa']; ?>"><?php echo $jasa['nama_jasa']; ?></option>
          <?php } ?>
            </select>
            </div>
            </div>-->

<!-- biaya -->

<!--fail biaya          <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Biaya</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="total" name="total" placeholder="total">
                  <?php
        include "../lib/koneksi.php";
        $kueriBiaya= mysqli_query($connection, "SELECT biaya from ongkir where id_kota=$kota, id_jasa=$jasa");
        while ($ongkir=mysqli_fetch_array($kueriBiaya)){
        ?>
            
          <?php } ?>


                  </div>
                  </div>
<!--fail end biaya-->
<!--End of trial biaya kirim -->


				  <div class="form-group">
					  <label for="inputEmail3" class="col-sm-2 control-label">Biaya Kirim</label>
					  <div class="col-sm-10">
					  <select class="from-control" name="status_order">
							<?php
				include "../lib/koneksi.php";
				$kueriBiaya= mysqli_query($connection, "SELECT * from ongkir");
				while ($ongkir=mysqli_fetch_array($kueriBiaya)){
				?>
						<option value="<?php echo $ongkir['id_ongkir']; ?>"><?php echo $ongkir['biaya']; ?></option>
				  <?php } ?>
						</select>
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