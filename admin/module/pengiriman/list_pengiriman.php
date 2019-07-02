 <?php   
 // session_start();
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
            <li class="active">Pengiriman</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pengiriman</h3>
                  
				  
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Id Pengiriman</th>
                      <th>Tanggal Pengiriman</th>
                      <th>ID Konfirmasi</th>
                      <th>Status pengiriman</th>
                      <th>No Resi</th>
					   <th style="width: 110px">Aksi</th>
                    </tr>
      					<?php
      					include "../lib/config.php";
      					include "../lib/koneksi.php";
      					$kueriKategori = mysqli_query($connection, "SELECT * from pengiriman");
                while($kat=mysqli_fetch_array($kueriKategori)){
                  ?>
                  <tr>
                    <td><?php echo $kat['id_pengiriman']; ?></td>
                    <td><?php echo $kat['tanggal_pengiriman']; ?></td>
                    <td><?php echo $kat['id_konfirmasi']; ?></td>
                    <td><?php echo $kat['status_pengiriman']; ?></td>
                    <td><?php echo $kat['no_resi']; ?></td>
                    <td>
                      <div class="btn-group">
                        <!--<a href="<?php echo $admin_url; ?>adminweb.php?module=edit_pengiriman&id_pengiriman=
                        <?php echo $kat['id_pengiriman']; ?>" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a>-->
                        <a href="<?php echo $admin_url; ?>module/pengiriman/aksi_hapus.php?id_pengiriman=
                        <?php echo $kat['id_pengiriman']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')"
                        class="btn btn-danger"><i class='fa fa-power-off'></i></button></a>
                      </div>
                    </td>
                  </tr>

                <?php } ?>
                  </table>
                </div><!-- /.box-body -->
			
				     <div class="box-footer">
				<a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_pengiriman"><button class="btn btn-primary">Tambah Pengiriman</button></a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>