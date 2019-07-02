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
            <small>Pengiriman</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Pengiriman</li>
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
			        <form class="form-horizontal" action="../admin/module/pengiriman/aksi_simpan.php" method="post">
                  <div class="box-body">

                    
                    
                  



                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Id Konfirmasi</label>
                      <div class="col-sm-10">
                        <select class="form-control" name="id_konfirmasi"><?php
                        include "../lib/koneksi.php";
                        $kueriKategori=mysqli_query($connection, "SELECT * from Konfirmasi"); 
                        while($kat=mysqli_fetch_array($kueriKategori)){
                          ?>
                          <option value="<?php echo $kat['id_konfirmasi'];?>"><?php echo $kat['id_konfirmasi'];?> - <?php echo $kat['atas_nama'];?> - <?php echo $kat['id_order'];?></option>
                          <?php } ?>
                          </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Pengiriman</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" placeholder="Tanggal Pengiriman">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Status Pengiriman</label>
                      <div class="col-sm-10">
                        <input type="Text" class="form-control" id="status_pengiriman" name="status_pengiriman" placeholder="Status Pengiriman">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">No Resi</label>
                      <div class="col-sm-10">
                        <input type="Text" class="form-control" id="no_resi" name="no_resi" placeholder="no_resi">
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