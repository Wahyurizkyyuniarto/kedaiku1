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
            <small>Ukuran</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ukuran</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Ukuran</h3>
                  
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
					  <th>ID Konfirmasi</th>
					  <th>ID Order</th>
					  <th>Nomer Rekening</th>
					  <th>Atas Nama</th>
					  <th>Tanggal Transfer</th>
					  <th>Gambar</th>
                      <th>Total Kirim</th>
					   <th style="width: 110px">Aksi</th>
                    </tr>
      					<?php
      					include "../lib/config.php";
      					include "../lib/koneksi.php";
      					$kueriKategori = mysqli_query($connection, "SELECT * from konfirmasi");
                while($kat=mysqli_fetch_array($kueriKategori)){
                  ?>
                  <tr>
					<td><?php echo $kat['id_konfirmasi']; ?></td>
					<td><?php echo $kat['id_order']; ?></td>
                    <td><?php echo $kat['no_rekening']; ?></td>
					<td><?php echo $kat['atas_nama']; ?></td>
					<td><?php echo $kat['tanggal_transfer']; ?></td>
					<td>
				
                        <img src="../images/images_konfirmasi/<?php echo $kat['gambar'];?>" height="280" width="240">
                     
					  </td>
					  
					<td><?php echo $kat['total_kirim']; ?></td>
                    <td>
                      <div class="btn-group">
                        <!--<a href="<?php echo $admin_url; ?>adminweb.php?module=edit_konfirmasi&id_konfirmasi=
                        <?php echo $kat['id_konfirmasi']; ?>" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a>-->
                        <a href="<?php echo $admin_url; ?>module/konfirmasi/aksi_hapus.php?id_konfirmasi=
                        <?php echo $kat['id_konfirmasi']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')"
                        class="btn btn-danger"><i class='fa fa-power-off'></i></button></a>
                      </div>
                    </td>
                  </tr>

                <?php } ?>
                  </table>
                </div><!-- /.box-body -->
			
				     <div class="box-footer">
				<!--<a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_ukuran"><button class="btn btn-primary">Tambah Ukuran</button></a>-->
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>