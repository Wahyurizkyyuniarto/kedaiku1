 <?php   

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
            <small>Pengiriman</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Pengiriman</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tambah Pengiriman</h3>
              </div>
              <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $IDPengiriman=$_GET['id_pengiriman'];
              $queryEdit=mysqli_query($connection, "SELECT * FROM pengiriman WHERE id_pengiriman='$IDPengiriman'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
			       $IDPengiriman=$hasilQuery['id_pengiriman'];
				   $tglpengirim=$hasilQuery['tanggal_pengiriman'];
				   $nomerresi=$hasilQuery['no_resi'];
				   

              ?>
			        <form class="form-horizontal" action="../admin/module/pengiriman/aksi_edit.php" method="post">
					<input type="hidden" name="id_pengiriman" value="<?php echo $IDPengiriman; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Pengiriman</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="tglpengirim" name="tanggal_pengiriman" placeholder="Tanggal Pengiriman" value="<?php echo $tglpengirim; ?>">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nomer Resi</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="nomerresi" name="no_resi" placeholder="Nomer Resi" value="<?php echo $nomerresi; ?>">
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