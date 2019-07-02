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
            <small>admin</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit admin</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
            <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Form Edit admin</h3>
              </div>
              <?php
              include "../lib/config.php";
              include "../lib/koneksi.php";

              $idAdmin=$_GET['id_admin'];
              $queryEdit=mysqli_query($connection, "SELECT * FROM admin WHERE id_admin='$idAdmin'");

              $hasilQuery=mysqli_fetch_array($queryEdit);
			       $idAdmin=$hasilQuery['id_admin'];
              $nama=$hasilQuery['nama'];
              $username=$hasilQuery['username'];
              $password=$hasilQuery['password'];
              $email=$hasilQuery['email'];

              ?>
			        <form class="form-horizontal" action="../admin/module/admin/aksi_edit.php" method="post">
					<input type="hidden" name="id_admin" value="<?php echo $idAdmin; ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Admin</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?php echo $nama; ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $username; ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">password</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="password" name="password" placeholder="password" value="<?php echo $password; ?>">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $email; ?>">
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