<section id="main-content">
<div>
  <ul class="breadcrumb">
    <li> <a href="./">Home</a> <span class="divider">/</span> </li>
    <li> <a href="?hal=produk">Form Input Produk</a> </li>
  </ul>
</div>
<div class="row-fluid sortable">
  <div class="box span12">
    <div class="box-header well" data-original-title>
      <h2><i class="icon-edit"></i> Tambah Produk</h2>
      <div class="box-icon"> <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a> </div>
    </div>
    <div class="box-content">
      <form name="fproduk" class="form-horizontal" method="post" action="modul/produk_proses.php" enctype="multipart/form-data">
        <fieldset>
          <legend> Tambah Produk</legend>
          <div class="control-group">
            <label class="control-label" for="disabledInput">Kode Produk </label>
            <div class="controls">
              <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="<?php echo kode_otomatis("barang","kode_barang","PR-",3,4);?>" disabled="">
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label" for="kategori">Kategori</label>
            <div class="controls">
              <select id="kategori" data-rel="chosen" class="input-xlarge" name="kode_kategori">
                <?php
				$sql_kat = mysqli_query($connection, "SELECT * FROM kategori ORDER BY nama_kategori");
				while($r_kat = mysqli_fetch_array($sql_kat))
				{
				?>
                <option value="<?php echo $r_kat['kode_kategori'];?>"><?php echo $r_kat['nama_kategori'];?></option>
                <?php
				}
				?>
              </select>
            </div>
          </div>
		  
		  <div class="control-group">
            <label class="control-label" for="merek">Merek</label>
            <div class="controls">
              <select id="merek" data-rel="chosen" class="input-xlarge" name="kode_merek">
                <?php
				$sql_mrk = mysqli_query($connection, "SELECT * FROM merek ORDER BY nama_merek");
				while($r_mrk = mysqli_fetch_array($sql_mrk))
				{
				?>
                <option value="<?php echo $r_mrk['kode_merek'];?>"><?php echo $r_mrk['nama_merek'];?></option>
                <?php
				}
				?>
              </select>
            </div>
          </div>
		  
          <div class="control-group">
            <label class="control-label" for="typeahead">Nama Produk </label>
            <div class="controls">
              <input type="text" class="input-xlarge typeahead" id="typeahead" name="nama_barang" />
            </div>
          </div>
          
		<div class="control-group">
            <label class="control-label" for="appendedPrependedInput">Harga</label>
            <div class="controls">
              <div class="input-prepend input-append">
                Rp. <input id="appendedPrependedInput" size="16" type="text" name="harga" class="harga"><span class="add-on">.00</span>
              </div>
            </div>
          </div>
		 
		<div class="control-group">
            <label class="control-label" for="gambar">Gambar</label>
            <div class="controls">
              <input class="input-file uniform_on" id="gambar" name="gambar" type="file">
            </div>
          </div>

		<div class="control-group">
            <label class="control-label" for="textarea2">Deskripsi </label>
            <div class="controls">
              <textarea class="cleditor" id="textarea2" rows="3" name="deskripsi"></textarea>
            </div>
        </div>
		
          <div class="control-group">
            <label class="control-label" for="appendedInput">Stok</label>
            <div class="controls">
              <div class="input-append">
                <input id="appendedInput" size="16" type="text" name="stok"><span class="add-on">Pcs</span> </div>
              </div>
          </div>
		  
          
          
          <div class="form-actions">
            <button type="submit" name="tambah" class="btn btn-primary" onclick="return validasi()">SIMPAN</button>
            <button type="reset" class="btn">BATAL</button>
          </div>
        </fieldset>
      </form>
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