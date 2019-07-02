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
            <small>Ukuran</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Ukuran</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit Ukuran</h3>
              </div>
              <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idUkuran=$_GET['id_ukuran'];
              $queryEdit=mysqli_query($connection, "SELECT * FROM ukuran WHERE id_ukuran='$idUkuran'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
			  $idUkuran		=$hasilQuery['id_ukuran'];
              $id_barang	=$hasilQuery['id_barang'];
			  $ukuran		=$hasilQuery['no_ukuran'];
			  $stok			=$hasilQuery['kuantitas'];

              ?>
			        <form class="form-horizontal" action="../admin/module/ukuran/aksi_edit.php" method="post">
					<input type="hidden" name="id_ukuran" value="<?php echo $idUkuran; ?>">
                  <div class="box-body">
					 <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                      <div class="col-sm-10">
            
                      <select class="form-control" name="id_barang">
                                <?php
                
					  include "../config/koneksi.php";
					  $kueriBarang= mysqli_query($connection, "SELECT * from barang ORDER BY nama_barang");
					  while($kat=mysqli_fetch_array($kueriBarang)){
                	  if ($hasilQuery['id_barang']==$kat['id_barang']){
                	  echo "<option value=$kat[id_barang] selected>$kat[nama_barang]</option>";   
					  }else{
                  	  echo "<option value=$kat[id_barang]>$kat[nama_barang]</option>";   
					  }
                      } ?>
                      </select>
                    </div>
                    </div>
					 <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Ukuran</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="ukuran" name="ukuran" placeholder="Ukuran" value="<?php echo $ukuran; ?>">
                      </div>
                    </div>
					<div>
					 <label for="inputEmail3" class="col-sm-2 control-label">Kuantitas</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="stok" name="kuantitas" placeholder="Stok" value="<?php echo $stok; ?>">
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