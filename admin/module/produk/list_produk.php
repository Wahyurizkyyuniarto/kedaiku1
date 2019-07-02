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
            <small>Produk</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Produk</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Produk</h3>
                   
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
					  
                      <th>Nama Barang</th>
					  <th>Harga</th>
					  <th>Stok</th>
					  <th>Deskripsi</th>
					  <th>Gambar</th>
           
					   <th style="width: 110px">Aksi</th>
                    </tr>
      					<?php
      					include "../lib/config.php";
						include "../lib/koneksi.php";
      					$kueriProduk= mysqli_query($connection, "SELECT * from barang");
      					while($prod=mysqli_fetch_array($kueriProduk)){
      					?>
                    <tr>
					  
                      <td><?php echo $prod['nama_barang']; ?></td>
					  <td><?php echo $prod['harga']; ?></td>
					  <td><?php echo $prod['stok']; ?></td>
					  <td><?php echo $prod['deskripsi']; ?></td>
					  <td>
				
                        <img src="upload/<?php echo $prod['gambar'];?>" height="220" width="240">
                     
					  </td>
					  
					  
                      
					  <td>
					   <div class="btn-group">
							
                          <a href="<?php echo $admin_url; ?>adminweb.php?module=edit_produk&id_barang=<?php echo $prod['id_barang']; ?>" class="btn btn-warning"><i class='fa fa-pencil'></i></button></a>
                          <a href="<?php echo $admin_url; ?>module/produk/aksi_hapus.php?id_barang=<?php echo $prod['id_barang'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-danger"><i class='fa fa-power-off'></i></button></a>
                        </div>
					  </td>
                    </tr>
              <?php } ?>
                  </table>
                </div><!-- /.box-body -->
			
				     <div class="box-footer">
				<a href="<?php echo $base_url; ?>admin/adminweb.php?module=tambah_produk"><button class="btn btn-primary">Tambah Produk</button></a>
        <a href="cetak_produk.php" target="blank"><button class="btn btn-primary">Cetak Laporan Produk</button></a>
                  </div><!-- /.box-footer -->
              </div><!-- /.box -->

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>