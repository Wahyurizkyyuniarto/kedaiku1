<?php 
$sid = session_id();
include "template/header.php";
error_reporting(0);
?>
	<section id="cart_items">
		<div class="container">
<?php
	$ses_total = $_SESSION['ses_total'];
	$ses_kode  = $_SESSION['ses_kode'];
	$ses_jum   = $_SESSION['ses_jum'];
	$ses_jml   = $_SESSION['ses_jml'];
	//$ses_txt   = $_SESSION['ses_txt'];
	?>
		<!-- menampilkan data keranjang -->
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Deskripsi</td>
							<td class="price">Harga</td>
							<td class="size">Ukuran</td>
							<td class="quantity">Jumlah barang</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
						$no=0;
						for ($i=0; $i < $ses_total; $i++) {
							if ($ses_kode[$i]=='') continue;
							$sql = mysqli_query($connection,"SELECT * FROM barang WHERE id_barang='$ses_kode[$i]'");
							$produk=mysqli_fetch_array($sql);
							$no++;
							$sberat = $produk['berat']*$ses_jum[$i];
							$stotal = $produk['harga']*$ses_jum[$i];
							$berat += $sberat;
							$total += $stotal;
							?>
							<tr>
								<td class="cart_description">
									<h4><a href=""><?=$produk['nama_barang']?></a></h4>
								</td>
								<td class="cart_price">
									<p>Rp. <?=$produk['harga']?></p>
								</td>
								<td><?=$ses_jml[$i]?></td>
								<td><?=$ses_jum[$i]?> item(s)</td>
								<td>Rp <?=$stotal?></td>

								<td class="cart_delete">
									<a class="cart_quantity_delete" href="sessi.php?sts=delete&kode=<?=$ses_kode[$i]?>" onclick="return confirm('Yakin akan menghapus ?')"><i class="fa fa-times"></i></a>
								</td>
							</tr>
					<?php	} ?>
					</tbody>
							<tr>
							  <td></td>
							  <td colspan="3">Total</td>
							  <td>Rp. <?=$total?></td>
							  <td></td>
							</tr>
				</table>
			</div>
		
			<div class="form-group col-md-12">
			<a href="produk.php"><button class="btn btn-success btn-lg">Pesan Lagi </button></a> 
			<a href="sessi.php?&sts=clear"><button class="btn btn-success btn-lg" onclick="return confirm('Yakin transaksi akan dibatalkan?')">Batal</button></a> 
			<a href="<?=$link?>" onclick="return confirm('Yakin transaksi akan disimpan?')"><button class="btn btn-success btn-lg">Proses Pemesanan</button></a>			
			</div>
		
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Proses Pemesanan</h2>
						<form method="post" action="simpan.php">
							<input type="hidden" name="ttl" value="<?=$total?>" required />
							<input type="hidden" name="ttl_b" value="<?=$berat?>" required />
						
						
						<?php 
						//Get Data Kabupaten
									// $curl = curl_init();
									// curl_setopt_array($curl, array(
										// CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
										// CURLOPT_RETURNTRANSFER => true,
										// CURLOPT_ENCODING => "",
										// CURLOPT_MAXREDIRS => 10,
										// CURLOPT_TIMEOUT => 30,
										// CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										// CURLOPT_CUSTOMREQUEST => "GET",
										// CURLOPT_HTTPHEADER => array(
											// "key:0ebde0daed285037f5b26eab94a407b1"
										// ),
									// ));
									
									// $response = curl_exec($curl);
									// $err = curl_error($curl);
									
									// curl_close($curl);
									
									// echo "
									// <select name='asal' id='asal'>";
									// echo "<option>Pilih Kota Asal</option>";
									// $data = json_decode($response, true);
									// for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
										// echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
									// }
									// echo "</select>";
									
									//Get Data Kabupaten
									//-----------------------------------------------------------------------------

									//Get Data Provinsi
									$curl = curl_init();

									curl_setopt_array($curl, array(
										CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
										CURLOPT_RETURNTRANSFER => true,
										CURLOPT_ENCODING => "",
										CURLOPT_MAXREDIRS => 10,
										CURLOPT_TIMEOUT => 30,
										CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST => "GET",
										CURLOPT_HTTPHEADER => array(
										"key:0ebde0daed285037f5b26eab94a407b1"
										),
										));

										$response = curl_exec($curl);
										$err = curl_error($curl);
										
										echo "
										*) Provisi Tujuan
										<select name='provinsi' id='provinsi'>";
												echo "<option>Pilih Provinsi Tujuan</option>";
												$data = json_decode($response, true);
												for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
													echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']." -".$data['rajaongkir']['results'][$i]['province']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
												}
												echo "</select>";

						?>
						*)Kota/Kab Tujuan
						<select id="kabupaten" name="kabupaten"></select>
						*) Kurir
						<select id="kurir" name="kurir">
									<option value="jne">JNE</option>
									<option value="tiki">TIKI</option>
								 	<option value="pos">POS INDONESIA</option>
						</select>
						*) Berat(gram)
							<input id="berat" type="text" name="berat" value="<?php echo $berat*1000; ?>" readonly />
						*) Ongkos Kirim
							<select id="ongkir" name="ongkos" required>
							</select>
						*) Nama Pemesan
							<input type="text" name="nama" placeholder="Nama Pemesan" value="<?=$_SESSION['nama']?>" readonly />
						*) Nama Penerima
							<input type="text" name="nama_p" placeholder="Nama Penerima" required />
						*) Alamat Penerima
							<input type="text" name="almt_p" placeholder="Alamat Penerima " value="<?=$_SESSION['alamat']?>" required />
						*) Telepon Penerima
							<input type="text" name="telp_p" placeholder="Telepon Penerima" value="<?=$_SESSION['no_hp']?>" readonly />
							<button type="submit" class="btn btn-default">Simpan Transaksi</button>
						</form>
					</div><!--/sign up form-->
				</div>
		
		
		</div>
	</section>
<?php
include "template/footer.php";
?>