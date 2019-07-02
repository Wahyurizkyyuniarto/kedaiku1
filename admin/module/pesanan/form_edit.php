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
            <small>Biaya Kirim</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Biaya Kirim</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Biaya Kirim</h3>
              </div>
              <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idOrder =$_GET['id_order'];
              $queryEdit=mysqli_query($connection, "SELECT * from tb_order
						join det_order on det_order.id_order=tb_order.id_order
						join pelanggan on pelanggan.id_pelanggan=tb_order.id_pelanggan
						join ongkir on ongkir.id_ongkir= tb_order.id_ongkir WHERE tb_order.id_order='$idOrder'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
			  $idOrder=$hasilQuery['id_order'];
              $nama=$hasilQuery['nama'];
              $ukuran=$hasilQuery['ukuran'];
			  $status=$hasilQuery['status_order'];
			  $tgl=$hasilQuery['tgl_order'];
			  $total=$hasilQuery['biaya'];

              ?>
			        <form class="form-horizontal" action="../admin/module/pesanan/aksi_edit.php" method="post">
					<input type="hidden" name="pesanan" value="<?php echo $nama; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-10">
						<select class="form-control" name="nama");
						<?php 
					include "../lib/koneksi.php";
					$queryEdit=mysqli_query($connection, "SELECT * from pelanggan");
					while ($order=mysqli_fetch_array($queryEdit)){
					?>
                        <option value="<?php echo $order['id_pelanggan']; ?>"><?php echo $order['nama']; ?></option>
				  <?php } ?>
						</select>
                      </div>
                    </div>
					
					<div class="form-group">
						      <label for="inputEmail3" class="col-sm-2 control-label">Ukuran</label>
						      <div class="col-sm-10">
						      <input type="number" class="form-control" id="ukuran" name="ukuran" placeholder="Ukuran">
                  </div>
                  </div>
				  <div class="form-group">
						      <label for="inputEmail3" class="col-sm-2 control-label">Warna</label>
						      <div class="col-sm-10">
						      <input type="text" class="form-control" id="warna" name="warna" placeholder="Warna">
                  </div>
                  </div>
				  <div class="form-group">
						      <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Order</label>
						      <div class="col-sm-10">
						      <input type="date" class="form-control" id="tgl_order" name="tgl_order" placeholder="Tanggal">
                  </div>
                  </div>
					<div class="form-group">
						      <label for="inputEmail3" class="col-sm-2 control-label">Biaya Ongkir</label>
						      <div class="col-sm-10">
						      <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya">
                  </div>
                  </div>
				  
				  
					
					<!--<div class="form-group">
                      
                      <label for="inputEmail3" class="col-sm-2 control-label">Jasa</label>
                      <div class="col-sm-10">
						<select class="form-control" name="id_jasa");
						<?php 
					//include "../lib/koneksi.php";
					//$queryEdit=mysqli_query($connection, "SELECT * from jasa");
					//while ($jasa=mysqli_fetch_array($queryEdit)){
					?>
                        <option value="<?php // echo $jasa['id_jasa']; ?>"><?php //echo $jasa['nama_jasa']; ?></option>
				  <?php// } ?>
						
                      </div>
                    </div>-->
					
                  

                    <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
			</div>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>