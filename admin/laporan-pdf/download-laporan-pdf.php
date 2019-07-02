<div style="border:1px solid rgb(238,238,238); padding:10px; overflow:auto; width:80%; height:475px;">
<h2 align="center"><font color="orange" size="4" face="arial"><b>Data Mahasiswa</b></font></h2><br>
<input type="button" value="Export To PDF" title="Save as PDF Format" onclick=window.open('laporan-pdf.php','_blank');><br><br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr bgcolor="#FF6600">
	<th width="5">No</td>&nbsp;
	<th width="80" height="42">NIM</td>&nbsp;
	<th width="160">Nama Mahasiswa</td>&nbsp;
	<th width="70">Jurusan</td>&nbsp;      
	<th width="60">Alamat</td>&nbsp;
	<th width="60">Telepon</td>&nbsp;    
</tr>
<?php
	include "../../koneksi-tutor.php";
	$Cari="SELECT * FROM mahasiswa ORDER BY id_mahasiswa";
	$Tampil = mysql_query($Cari);
	$nomer=0;
    while (	$hasil = mysql_fetch_array ($Tampil)) {
			$id_mahasiswa	= stripslashes ($hasil['id_mahasiswa']);
			$nama 			= stripslashes ($hasil['nama']);
			$jurusan 		= stripslashes ($hasil['jurusan']);
			$alamat 		= stripslashes ($hasil['alamat']);
			$telepon 		= stripslashes ($hasil['telepon']);
		{
	$nomer++;
?>
	<tr align="center" bgcolor="#DFE6EF">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr align="center">
		<td height="32"><?=$nomer?><div align="center"></div></td>
		<td><?=$id_mahasiswa?><div align="center"></div></td>
		<td><?=$nama?><div align="center"></div></td>
		<td><?=$jurusan?><div align="center"></div></td>
		<td><?=$alamat?><div align="center"></div></td>
		<td><?=$telepon?><div align="center"></div></td>
	</tr>
	<tr align="center" bgcolor="#DFE6EF">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td> 
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
<?php  
		}
	}
//Tutup koneksi engine MySQL
	mysql_close($Open);
?>
</table>
</div>