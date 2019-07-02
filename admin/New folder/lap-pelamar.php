
<?php
//class ezpdf yg di panggil
include "pdf/class.ezpdf.php"; 
$pdf = new Cezpdf('A4','lanscape');

//Set margin dan font
$pdf->ezSetCmMargins(3, 3, 3, 3);
$pdf->selectFont('pdf/fonts/Times-Roman.afm');

//Tampilkan gambar di dokumen PDF
$pdf->addJpegFromFile('mylogo.jpg',40,778,70);

//Teks di tengah atas untuk judul header
$pdf->addText(230, 815, 14,'<b>Daftar Pelamar Kerja</b>');
$pdf->addText(160, 800, 12,'<b>RS IMANUEL WAY HALIM BANDAR LAMPUNG</b>');
$pdf->addText(210, 785, 10,'Jl. Soekarno - Hatta No.1 Bandar Lampung');
//Garis atas untuk header
$pdf->line(2, 770, 590, 770);

//Garis bawah untuk footer
$pdf->line(2, 50, 590, 50);

//Teks kiri bawah
date_default_timezone_set("Asia/Jakarta");
$pdf->addText(410,34,8,'Dicetak tgl:' . date( 'd-m-Y, H:i:s'));

//Koneksi ke database dan tampilkan datanya
mysql_connect("localhost", "root", "");
mysql_select_db("sdm");

$Dari=$_POST['Dari'];
$Sampai=$_POST['Sampai'];

$tampil = "SELECT * FROM tbpelamar WHERE (TglSurat BETWEEN '$Dari' AND '$Sampai');";
$sql = mysql_query($tampil);  
$jml = mysql_num_rows($sql);
if ($jml > 0){
$i = 1;
while($r = mysql_fetch_array($sql)) {
//Format Menampilkan data di ezPdf
 $data[$i]=array('No'=>$i,
          'Nomor Dokumen'=>"$r[Nomor]",
       'Nama Pelamar'=>"$r[Nama]",
       'Alamat'=>"$r[AlamatKTP]",
       'Agama'=>"$r[Agama]",
       'Program Study'=>"$r[Jurusan]",
       'Jenjang'=>"$r[Jenjang]",
       'IPK'=>"$r[IPK]",
       'Tgl Melamar'=>"$r[TglSurat]"
       );
 $i++;

}

//Tampilkan Dalam Bentuk Table
$pdf->ezTable($data);

$pdf->ezText("\nPeriode: $Dari s/d $Sampai");

// Penomoran halaman
$pdf->ezStartPageNumbers(700, 20, 8);
$pdf->ezStream();
}

else{

 echo "
 <script>
 alert('Tidak Di Temukan Data Pelamar');
 </script>
 ";

}
?>