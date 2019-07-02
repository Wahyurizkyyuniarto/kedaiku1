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
            <small>Penjualan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Penjualan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Penjualan</h3>
                  
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
                  
                      <th>Tanggal</th>
                      <th>Nama Barang</th>
                      <th>Kategori</th>
                      <th>jumlah</th>
                      <th>Pembeli</th>
                      <th>Dikirim Ke</th>
					   
                    </tr>
      					<?php
      					include "../lib/config.php";
      					include "../lib/koneksi.php";
      					$pilih= mysqli_query($connection, "SELECT * from tb_order t
                  JOIN det_order o ON t.id_order=o.id_order
                  JOIN barang b ON o.id_barang=b.id_barang
                  JOIN kategori k ON b.id_kategori=k.id_kategori
                  JOIN pelanggan p ON t.id_pelanggan=p.id_pelanggan
                  ");
      					while($tampil=mysqli_fetch_array($pilih)){
      					?>
                    <tr>
                 
                     
                      <td><?php echo $tampil['tgl_order']; ?></td>
                      <td><?php echo $tampil['nama_barang']; ?></td>
                      <td><?php echo $tampil['nama_kategori']; ?></td>
                      <td><?php echo $tampil['jumlah'];?></td>
                      <td><?php echo $tampil['nama'];?></td>
                      <td><?php echo $tampil['alamat_penerima'];?></td>
					 
                    </tr>
              <?php } ?>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
        <a href="cetak_admin.php" target="blank"><button class="btn btn-primary">by date</button></a> <br><br>
        <a href="cetak_pelanggan.php" target="blank"><button class="btn btn-primary">by pelanggan</button></a><br><br>
        <a href="cetak_penjualan.php" target="blank"><button class="btn btn-primary">Laporan Penjualan</button></a><br><br>

                  </div><!-- /.box-footer -->
			
				
              </div><!-- /.box -->

            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php } ?>