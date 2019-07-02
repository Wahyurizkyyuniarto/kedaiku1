<?php

include "template/header.php";
?>

<!-- Start from here MUNNNNNAAAA -->
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			
			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

<!-- form checkout -->
			<div class="shopper-informations">
				<div class="row">

					<div class="col-sm-8 clearfix">
						<div class="bill-to">

							<p>Bill To</p>
							
							 <div class="table-responsive">
                 <div class="title"><h3>Form Checkout</h3></div>
                 <div class="hero-unit">Harap isi form dibawah ini dengan lengkap dan benar sesuai idenditas anda!</div>
                <div class="hero-unit">Total Belanja Anda Rp. <?php echo abs((int)$_GET['total']); ?>,-</div> 
    <form id="formku" action="selesai.php" method="post">
    <table class="table table-condensed">
    <input type="hidden" name="total" value="<?php echo abs((int)$_GET['total']); ?>">
    <tr>
        <td><label for="nm_usr">Nama</label></td>
        <td><input name="nm_usr" type="text" class="required" minlength="6" id="nm_usr" size="200" /></td>
      </tr>
      <tr>
        <td><label for="log_usr">Username</label></td>
        <td><input name="log_usr" type="text" class="required" minlength="6" id="log_usr" /></td>
      </tr>
      <tr>
        <td><label for="pas_usr">Password</label></td>
        <td><input name="pas_usr" type="password" class="required" minlength="6" id="pas_usr" /></td>
      </tr>
      <tr>
        <td><label for="email_usr">Email</label></td>
        <td><input name="email_usr" type="text" class="email required" id="email_usr" /></td>
      </tr>
      <tr>
        <td><label for="almt_usr">Alamat</label></td>
        <td><input name="almt_usr" type="text" class="required" id="almt_usr" /></td>
      </tr>
      <tr>
        <td><label for="kp_usr">Kode Pos</label></td>
        <td><input name="kp_usr" type="text" class="required number" minlength="5" maxlength="5" id="kp_usr" /></td>
      </tr>
      <tr>
        <td><label for="kota_usr">Kota</label></td>
        <td><input name="kota_usr" type="text" class="required" minlength="6" id="kota_usr" /></td>
      </tr>
      <tr>
        <td><label for="tlp">No telepon</label></td>
        <td><input name="tlp" type="text" class="required number" minlength="12" id="tlp" /></td>
      </tr>
      <tr>
        <td><label for="rek">No Rekening</label></td>
        <td><input name="rek" type="text" class="required number" minlength="12" id="rek" /></td>
      </tr>
      <tr>
        <td><label for="nmrek">Nama Rekening</label></td>
        <td><input name="nmrek" type="text" class="required" minlength="6" id="nmrek" /></td>
      </tr>
      <tr>
        <td><label for="bank">Bank</label></td>
        <td><select name="bank" class="required">
        <option></option>
        <option value="Mandiri">Mandiri</option>
        <option value="BNI">BNI</option>
        <option value="CIMB">CIMB</option>
        <option value="BCA">BCA</option>
        <option value="Bank Jabar">Bank Jabar</option>
        <option value="Danamon">Danamon</option>
        <option value="BRI">BRI</option>
        <option value="Permata">Permata</option>
        </select>
        </td>
      </tr>
      <tr>
      <td></td>
        <td><input type="submit" value="Simpan Data" name="finish"  class="btn btn-sm btn-primary"/>&nbsp;<a href="index.php" class="btn btn-sm btn-primary">Kembali</a></td>
        </tr>
    </table>
    </form>
                   </div>
		
							


						</div>
					</div>

						
					<div class="checkout-options">
				
					<ul class="nav">
					<li>
						<button type="reset" class="btn btn-default get" onclick="window.location='checkout.php'">Cancel</button>
					</li>
					<li>
						<button type="submit" class="btn btn-default get" onclick="window.location='selesai.php'">Continue</button>
					</li>
				</ul>
			</div><!--/checkout-options-->				
				</div>
			</div>
			<!-- END of form checkout -->


			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<?php

	$ses_total = $_SESSION['ses_total'];
	$ses_kode  = $_SESSION['ses_kode'];
	$ses_jum   = $_SESSION['ses_jum'];
	?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
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
							$total += $stotal;
							?>

							<tr>
								<td class="cart_description">
									<h4><a href=""><?=$produk['nama_barang']?></a></h4>
								</td>
								<td class="cart_price">
									<p>Rp. <?=$produk['harga']?></p>
								</td>

								<td><?=$ses_jum[$i]?> item(s)</td>
								<td>Rp <?=$stotal?></td>

								<td class="cart_delete">
									<a class="cart_quantity_delete" href="sessi.php?sts=delete&kode=<?=$ses_kode[$i]?>" onclick="return confirm('Yakin akan menghapus ?')"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							

					<?php	} ?>
												<tr>
							  <td></td>
							  <td colspan="2">Total</td>
							  <td>Rp. <?=$total?></td>
							  <td></td>
							</tr>
					</tbody>
				</table>
			</div>

			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->






<?php 
include "template/footer.php";
?>