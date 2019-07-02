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
            <small>Jasa Pengiriman</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Jasa Pengiriman</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Jasa Pengiriman</h3>
              </div>
              <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idJasa=$_GET['id_jasa'];
              $queryEdit=mysqli_query($connection, "SELECT * FROM jasa WHERE id_jasa='$idJasa'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
			       $idJasa=$hasilQuery['id_jasa'];
              $namaJasa=$hasilQuery['nama_jasa'];

              ?>
			        <form class="form-horizontal" action="../admin/module/jasa/aksi_edit.php" method="post">
					<input type="hidden" name="id_jasa" value="<?php echo $idJasa; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Jasa</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaJasa" name="nama_jasa" placeholder="Nama Jasa" value="<?php echo $namaJasa; ?>">
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