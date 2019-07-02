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
            <li class="active">Biaya Kirim</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Biaya Kirim</h3>
                  
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
					  <th>ID Ongkir</th>
					  
                      <th>Kota</th>
                      
                      <th>Biaya</th>
					   <th style="width: 110px">Aksi</th>
                    </tr>
      					<?php
      					include "../lib/config.php";
      					include "../lib/koneksi.php";
      					$kueriKirim= mysqli_query($connection, "SELECT * from ongkir join kota on kota.id_kota=ongkir.id_kota order by id_ongkir asc ");
      					while($kir=mysqli_fetch_array($kueriKirim)){
      					?>
                    <tr>
					  <td><?php echo $kir['id_ongkir']; ?></td>
                      <td><?php echo $kir['nama_kota']; ?></td>
                      
                      <td><?php echo $kir['biaya']; ?></td>
					  <td>
					   <div class="btn-group">
							
                          <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_biaya&id_ongkir=<?php echo $kir['id_ongkir']; ?>" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a>
                          <a href="<?php echo $admin_url; ?>module/biaya/aksi_hapus.php?id_ongkir=<?php echo $kir['id_ongkir'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='fa fa-power-off'></i></button></a>
                        </div>
					  </td>
                    </tr>
              <?php } ?>

                  </table>
                </div><!-- /.box-body -->
			
				     <div class="box-footer">
				<a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_biaya"><button class="btn btn-primary">Tambah Biaya Kirim</button></a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>