<section id="main-content">
<div>
  <ul class="breadcrumb">
    <li> <a href="./">Home</a> <span class="divider">/</span> </li>
    <li> <a href="?hal=produk">Produk</a> </li>
  </ul>
</div>

<?php
        $sql_mrk = mysqli_query($connection, "SELECT * FROM merek ORDER BY nama_merek");
        while($r_mrk = mysqli_fetch_array($sql_mrk))
        {
        ?>
        <?php
        }
        ?>

        <?php
        $sql_kat = mysqli_query($connection, "SELECT * FROM kategori ORDER BY nama_kategori");
        while($r_kat = mysqli_fetch_array($sql_kat))
        {
        ?>
        <?php
        }
        ?>

<!-- TABEL -->
<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header well" data-original-title>
      <h2><i class="icon-user"></i> Produk</h2>
      <div class="box-icon"> <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a> </div>
    </div>
    <div class="box-content">
      <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
          <tr>
            <th width="90px">Kode</th>
			<th>Merek</th>
            <th>Kategori</th>
            <th>Produk</th>
            <th>Harga</th>
            <th width="90px">Gambar</th>
			<th width="120px">Deskripsi</th>
			<th>Stok</th>
            <th width="260">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
		$sql_prod = mysqli_query($connection, "SELECT * FROM barang p JOIN kategori k ON p.kode_kategori=k.kode_kategori JOIN merek m ON p.kode_merek = m.kode_merek ORDER BY nama_kategori, nama_barang");
		if(mysqli_num_rows($sql_kat)>0)
		{
			while($hasil = mysqli_fetch_array($sql_prod))
			{
		?>
          <tr>
            <td><?php echo $hasil['kode_barang'];?></td>
        
			<td class="center"><?php echo $hasil['nama_merek'];?></td>
			<td class="center"><?php echo $hasil['nama_kategori'];?></td>
            <td class="center"><?php echo $hasil['nama_barang'];?></td>
            <td class="center"><?php echo angka($hasil['Harga']);?></td>
			<td class="center"><img src="uploaded/produk/small_<?php echo $hasil['Gambar'];?>" /></td>
            <td class="center"><?php echo $hasil['Deskripsi'];?></td>
			<td class="center"><?php echo $hasil['stok'];?></td>
            
            <td class="center">
            <a class="btn btn-info" href="?hal=review&id=<?php echo $hasil['kode_barang'];?>"> <i class="icon-view icon-white"></i> Review </a>
            <a class="btn btn-info" href="?hal=produk_ubah&id=<?php echo $hasil['kode_barang'];?>"> <i class="icon-edit icon-white"></i> Ubah </a> 
            <a class="btn btn-danger" href="modul/produk_proses.php?hapus=<?php echo $hasil['kode_barang'];?>"> <i class="icon-trash icon-white"></i> Hapus </a></td>
          </tr>
          <?php
			}
		}
		?>
        </tbody>
      </table>
    </div>
  </div>
  <!--/span--> 
  
</div>
<!--/row-->

<script type="text/javascript">

function validasi(){
	var cek;
	var fname = document.fproduk;
	if(fname.id_kategori.value==''){
		cek = false;
		alert("nama kategori harus dipilih");
		fname.id_kategori.focus();
	}else if(fname.nama_produk.value==''){
		cek = false;
		alert("nama produk harus diisi");
		fname.nama_produk.focus();
	}else if(fname.ukuran.value==''){
		cek = false;
		alert("ukuran produk harus diisi");
		fname.ukuran.focus();
	}else if(fname.berat.value=='' || fname.berat.value=='0'){
		cek = false;
		alert("berat produk harus diisi");
		fname.berat.focus();
	}else if(isNaN(fname.berat.value)){
		cek = false;
		alert("berat produk harus digit angka");
		fname.berat.focus();
	}else if(fname.stok.value==''){
		cek = false;
		alert("stok produk harus diisi");
		fname.stok.focus();
	}else if(isNaN(fname.stok.value)){
		cek = false;
		alert("stok produk harus digit angka");
		fname.stok.focus();
	}else if(fname.harga.value=='' || fname.harga.value=='0'){
		cek = false;
		alert("harga produk harus diisi");
		fname.harga.focus();
	}else if(isNaN(fname.harga.value)){
		cek = false;
		alert("harga produk harus digit angka");
		fname.harga.focus();
	}else if(fname.gambar.value==''){
		cek = false;
		alert("gambar produk harus dipilih");
		fname.gambar.focus();
	}else{
		cek = true;
	}return cek;
}
</script>
</section>