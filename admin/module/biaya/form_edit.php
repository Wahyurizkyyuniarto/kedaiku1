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

              $idOngkir=$_GET['id_ongkir'];
              $queryEdit=mysqli_query($connection, "SELECT * FROM ongkir WHERE id_ongkir='$idOngkir'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
			  
              $idOngkir=$hasilQuery['id_ongkir'];
              $kota=$hasilQuery['id_kota'];
              $biaya=$hasilQuery['biaya'];
              ?>
              <form class="form-horizontal" action="../admin/module/biaya/aksi_edit.php" method="post">
              <div class="box-body">
			  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Kota Pengiriman</label>
			<div class="col-sm-10">
			<select class="form-control" name="id_kota"><?php
			include "../lib/koneksi.php";
			$kueriKategori=mysqli_query($connection, "SELECT * from kota"); 
			while($kat=mysqli_fetch_array($kueriKategori)){
			?>
			<option value="<?php echo $kat['id_kota'];?>"><?php echo $kat['nama_kota'];?></option>
			<?php } ?>
			</select>
				</div>
					</div>
              
            <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Biaya</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya" value="<?php echo $biaya; ?>">
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