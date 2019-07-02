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
            <li class="active">Pesanan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pesanan</h3>
                  
				  <div class="box-tools">
				  
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>	
                      </div>
					  
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
					  <th>ID Order</th>
                      <th>Nama</th>
					  <th>Ukuran</th>
					  <th>Status Order</th>
					  <th>Tanggal Order</th>
					  <th>Total Order</th>
					  <th>Biaya Ongkir</th>
                    </tr>
      					<?php
      					include "../lib/config.php";
      					include "../lib/koneksi.php";
      					$kueriBiaya= mysqli_query($connection, "SELECT * from tb_order
						join det_order on det_order.id_order=tb_order.id_order
						join pelanggan on pelanggan.id_pelanggan=tb_order.id_pelanggan");
						if ($kueriBiaya === FALSE) {
						die(mysqli_error());
						}
      					while($pro=mysqli_fetch_array($kueriBiaya)){
      					?>
                    <tr>
					  <td><?php echo $pro['id_order']; ?></td>
                      <td><?php echo $pro['nama']; ?></td>
					  <td><?php echo $pro['ukuran']; ?></td>
					  <td><?php echo $pro['status_order']; ?></td>
                      <td><?php echo $pro['tgl_order']; ?></td>
                      <td><?php echo $pro['total']; ?></td>
                      <td><?php echo $pro['id_ongkir']; ?></td>
                      
					  <td>
					   <div class="btn-group">
						<a href="<?php echo $admin_url; ?>module/pesanan/aksi_hapus.php?&id_order=
						<?php echo $pro['id_order'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')"
						  class="btn btn-danger"><i class='fa fa-power-off'></i></button></a>
                        </div>
					  </td>
                    </tr>
              <?php } ?>
                  </table>
                </div><!-- /.box-body -->
			
				     <div class="box-footer">
				<!--<a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_pesanan"><button class="btn btn-primary">Tambah Pesanan</button></a>-->
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>