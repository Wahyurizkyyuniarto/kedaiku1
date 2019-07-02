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
            <small>Merk</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Merk</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Tambah Merk</h3>
              </div>
              <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idMerk=$_GET['id_merk'];
              $queryEdit=mysqli_query($connection, "SELECT * FROM merk WHERE id_merk='$idMerk'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
					$idMerk=$hasilQuery['id_merk'];
					$namaMerk=$hasilQuery['nm_merk'];

              ?>
			        <form class="form-horizontal" action="../admin/module/merk/aksi_edit.php" method="post">
					<input type="hidden" name="id_merk" value="<?php echo $idMerk; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Merk</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaMerk" name="nm_merk" placeholder="Nama Merk" value="<?php echo $namaMerk; ?>">
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