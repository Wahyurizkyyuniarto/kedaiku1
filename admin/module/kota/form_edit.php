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
            <small>Kota Tujuan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Kota Tujuan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Kota Tujuan</h3>
              </div>
              <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idKota=$_GET['id_kota'];
              $queryEdit=mysqli_query($connection, "SELECT * FROM kota WHERE id_kota='$idKota'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
			       $idKota=$hasilQuery['id_kota'];
              $namaKota=$hasilQuery['nama_kota'];

              ?>
			        <form class="form-horizontal" action="../admin/module/kota/aksi_edit.php" method="post">
					<input type="hidden" name="id_kota" value="<?php echo $idKota; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Kota</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaKota" name="nama_kota" placeholder="Nama Kota" value="<?php echo $namaKota; ?>">
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