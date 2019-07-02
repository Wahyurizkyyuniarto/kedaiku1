<!DOCTYPE html>
<html>
<head>
	<title>MENAMPILKAN DATA DARI DATABASE SESUAI TANGGAL DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>
 
	<center>
 
		<h2>MENAMPILKAN DATA DARI DATABASE SESUAI TANGGAL DENGAN PHP<br/><a href="https://www.malasngoding.com">WWW.MALASNGODING.COM</a></h2>
 
 
		<?php 
		include '../../lib/koneksi.php';
		?>
 
		<br/><br/><br/>
 
		<form method="get">
			<label>PILIH TANGGAL</label>
			<input type="month" name="tgl_order">
			<input type="submit" value="FILTER">
		</form>

		<form method="get">
			<label>PILIH bulan</label>
			<input type="month" name="tgl_order">
			<select type="month" name="bulan">
				<option>Januari</option>
				<option>Feb</option>
			</select>
			<input type="submit" value="bulan">
		</form>
 
		<br/> <br/>
 
		<table border="1">
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Nama Barang</th>
				<th>Jumlah</th>
			</tr>
			<?php 
			$no = 1;
 
			if(isset($_GET['tgl_order'])){
				$tgl = $_GET['tgl_order'];
				$sql = mysqli_query($connection,"select * from tb_order where tgl_order='$tgl'");
			}elseif(isset($_GET['bulan'])){
				$bln = $_GET['bulan'];
				$sql = mysqli_query($connection, "select * from tb_order 
					where tgl_order=%'".$_GET['bulan']."'% ");
			}else{
				$sql = mysqli_query($connection,"select * from tb_order");
			}


			
			while($data = mysqli_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['tgl_order']; ?></td>
				<td><?php echo $data['nama_penerima']; ?></td>
				<td><?php echo $data['total']; ?></td>
			</tr>
			<?php 
			}
			?>
		</table>
 
	</center>
</body>
</html>