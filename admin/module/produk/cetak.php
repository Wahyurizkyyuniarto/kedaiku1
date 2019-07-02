<?php 
if(!isset($_SESSION))
		{
			session_start();
		} else {
?>

<table>
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