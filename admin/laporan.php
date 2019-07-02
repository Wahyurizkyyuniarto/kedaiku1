<?php require_once('../lib/koneksi.php'); ?>
<?php require_once('../lib/config.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_koneksi, $koneksi);
$query_t = "SELECT * FROM transaksi";
$t = mysql_query($query_t, $koneksi) or die(mysql_error());
$row_t = mysql_fetch_assoc($t);
$totalRows_t = mysql_num_rows($t);

$colname_ct = "-1";
if (isset($_GET['id_transaksi'])) {
  $colname_ct = $_GET['id_transaksi'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_ct = sprintf("SELECT * FROM transaksi WHERE id_transaksi = %s", GetSQLValueString($colname_ct, "int"));
$ct = mysql_query($query_ct, $koneksi) or die(mysql_error());
$row_ct = mysql_fetch_assoc($ct);
$totalRows_ct = mysql_num_rows($ct);

$colname_cp = "-1";
if (isset($_GET['id_pelanggan'])) {
  $colname_cp = $_GET['id_pelanggan'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_cp = sprintf("SELECT * FROM pelanggan WHERE id_pelanggan = %s", GetSQLValueString($colname_cp, "int"));
$cp = mysql_query($query_cp, $koneksi) or die(mysql_error());
$row_cp = mysql_fetch_assoc($cp);
$totalRows_cp = mysql_num_rows($cp);

$colname_tgl = "-1";
if (isset($_GET['tanggal'])) {
  $colname_tgl = $_GET['tanggal'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_tgl = sprintf("SELECT * FROM transaksi WHERE tanggal = %s", GetSQLValueString($colname_tgl, "date"));
$tgl = mysql_query($query_tgl, $koneksi) or die(mysql_error());
$row_tgl = mysql_fetch_assoc($tgl);
$totalRows_tgl = mysql_num_rows($tgl);

$colname_s = "-1";
if (isset($_GET['status'])) {
  $colname_s = $_GET['status'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_s = sprintf("SELECT * FROM transaksi WHERE status = %s", GetSQLValueString($colname_s, "text"));
$s = mysql_query($query_s, $koneksi) or die(mysql_error());
$row_s = mysql_fetch_assoc($s);
$totalRows_s = mysql_num_rows($s);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title>Laporan Transaksi Penjualan</title>
<LINK REL=StyleSheet HREF="../style.css" TYPE="text/css" MEDIA=screen>
<script src="../Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body onLoad="MM_preloadImages('../images/input_sepatu2.png','../images/input_merk.png','../images/pelanggan2.png','../images/testimoni2.png','../images/laporan2.png','../images/editpassword.png')">

<div id="page"><div id="page2">
	<div id="header">
			<h1><a href="#"><img src="../images/toko-online.png" width="47" height="46"> M&M Collections</a></h1>
			<div class="description"> Pusat Sepatu Murah - Berkualitas.</div>
	</div>
	
	<div id="menulinks">
		<a href=admin.php><span>Home</span></a>
		<a href=logout.php><span>Logout</span></a>
		
	</div>
	
	
	<div id="mainarea">
	  <div id="produk">
	    <h1 class="Judul">&nbsp;        </h1>
	    <h1 class="Judul">
	      <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="550" height="97">
	        <param name="movie" value="../banner.swf">
	        <param name="quality" value="high">
	        <param name="wmode" value="opaque">
	        <param name="swfversion" value="9.0.45.0">
	        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
	        <param name="expressinstall" value="../Scripts/expressInstall.swf">
	        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
	        <!--[if !IE]>-->
	        <object type="application/x-shockwave-flash" data="../banner.swf" width="550" height="97">
	          <!--<![endif]-->
	          <param name="quality" value="high">
	          <param name="wmode" value="opaque">
	          <param name="swfversion" value="9.0.45.0">
	          <param name="expressinstall" value="../Scripts/expressInstall.swf">
	          <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
	          <div>
	            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
	            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
              </div>
	          <!--[if !IE]>-->
            </object>
	        <!--<![endif]-->
          </object>
        </h1>
	    <h1 class="Judul">&nbsp;</h1>
	    <h1 class="Judul">Panel Pencarian Data :</h1>
	    <table width="562" border="1" align="center" cellpadding="0" cellspacing="0">
	      <tr>
	        <td width="558" height="60">
        [ paste kode panel pencarian laporan disini]
            </td>
          </tr>
        </table>
	    <hr>
	    <tr>
          <td height="30">&nbsp;
            <?php if ($totalRows_ct > 0) { // Show if recordset not empty ?>
  [ Paste kode hasil pencarian ID transaksi disini ]
  <?php } // Show if recordset not empty ?></td>
        </tr>
      <br>  
	  
        <tr>
	        <td height="23">&nbsp;
              <?php if ($totalRows_cp > 0) { // Show if recordset not empty ?>
  [ Paste kode hasil pencarian ID Pelanggan disini ]
                <?php } // Show if recordset not empty ?>
                <br>
              <?php if ($totalRows_tgl > 0) { // Show if recordset not empty ?>
  [ Paste kode hasil pencarian tanggal transaksi disini ]
  <?php } // Show if recordset not empty ?>
  <br>
  <?php if ($totalRows_s > 0) { // Show if recordset not empty ?>
  
[ Paste kode hasil pencarian status transaksi disini ]

  <?php } // Show if recordset not empty ?>
  <hr></td>
          </tr>
        <div align="center">
          <table width="557" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td width="553" align="center"><p><span class="Judul">Data Laporan Transaksi Penjualan:</span><br>
          </p>
       [ Paste kode data laporan disini ]
                
              <p>&nbsp;</p></td>
            </tr>
          </table>
        </div>
      </div>
	</div>
    
    
    
    
    <p>
      <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="243" height="116">
        <param name="movie" value="../jam.swf">
        <param name="quality" value="high">
        <param name="wmode" value="opaque">
        <param name="swfversion" value="9.0.45.0">
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
        <param name="expressinstall" value="../Scripts/expressInstall.swf">
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="../jam.swf" width="243" height="116">
          <!--<![endif]-->
          <param name="quality" value="high">
          <param name="wmode" value="opaque">
          <param name="swfversion" value="9.0.45.0">
          <param name="expressinstall" value="../Scripts/expressInstall.swf">
          <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
          <div>
            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
          </div>
          <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
      </object>
    </p>
    <div id="kanan">
    <div id="cart">
	  <h2>
	    Input Data :</h2>
	  <table width="212" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td width="97" align="center"><a href="data_sepatu.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('1','','../images/input_sepatu2.png',1)"><img src="../images/input_sepatu.png" alt="Input Data Sepatu" width="64" height="64" id="1"></a></td>
	      <td width="19" align="center">&nbsp;</td>
	      <td width="96" align="center"><a href="data_merk.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('2','','../images/input_merk.png',1)"><img src="../images/input_merk2.png" alt="Input Data Merk" width="64" height="64" id="2"></a></td>
	      </tr>
	    <tr>
	      <td align="center">Produk</td>
	      <td align="center">&nbsp;</td>
	      <td align="center">Merk</td>
	      </tr>
	    </table>
    </div>
    <table width="215" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="215"><hr></td>
      </tr>
  </table>
  
  <div id="cart">
	  <h2>
	    Laporan :</h2>
	  <table width="214" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td width="96" align="center"><a href="laporan.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('5','','../images/laporan2.png',1)"><img src="../images/laporan.png" width="64" height="64" id="5" border="0"></a></td>
	      <td width="21" align="center">&nbsp;</td>
	      <td width="97" align="center"><a href="pengiriman.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image19','','../images/detail.png',1)"><img src="../images/checkout.png" width="64" height="64" id="Image19"></a></td>
	      </tr>
	    <tr>
	      <td align="center">Transaksi</td>
	      <td align="center">&nbsp;</td>
	      <td align="center"><a href="pengiriman.php">Pengiriman</a></td>
	      </tr>
	    </table>
  </div>
    <table width="215" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="215"><hr></td>
      </tr>
  </table>
  
  <div id="cart">
	  <h2>
	    Pengunjung :</h2>
	  <table width="214" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td width="96" align="center"><a href="pelanggan.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('3','','../images/pelanggan2.png',1)"><img src="../images/pelanggan.png" width="64" height="64" id="3"></a></td>
	      <td width="21" align="center">&nbsp;</td>
	      <td width="97" align="center"><a href="testimoni.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('4','','../images/testimoni2.png',1)"><img src="../images/testimoni.png" width="64" height="64" id="4"></a></td>
	      </tr>
	    <tr>
	      <td align="center">Pelanggan</td>
	      <td align="center">&nbsp;</td>
	      <td align="center">Testimoni</td>
	      </tr>
	    </table>
  </div>
    <table width="215" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="215"><hr></td>
      </tr>
  </table>

    <div id="cart">
	  <h2>
	    User &amp; Password :</h2>
	  <table width="214" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td width="96" align="center"><a href="add1.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image11','','../images/input_sepatu2.png',1)"><img src="../images/password.png" alt="Input Password" width="64" height="64" id="Image11"></a></td>
	      <td width="21" align="center">&nbsp;</td>
	      <td width="97" align="center"><a href="password.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image12','','../images/editpassword.png',1)"><img src="../images/editpassword1.png" alt="Update Password" width="64" height="64" id="Image12"></a></td>
	      </tr>
	    <tr>
	      <td align="center">Input</td>
	      <td align="center">&nbsp;</td>
	      <td align="center">Password</td>
	      </tr>
	    </table>
  </div>
    </div>
	
    
	<div id="footer">
		<a href="http://www.free-css-templates.com/">Designed by <a href="https://web.facebook.com/profile.php?id=100007188136084">Maman Mulyadi | BSI Karawang 2015</a>, Thanks to Web Design UK
	</div>


</div></div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID2");
</script>
</body>

</html>
<?php
mysql_free_result($t);

mysql_free_result($ct);

mysql_free_result($cp);

mysql_free_result($tgl);

mysql_free_result($s);
?>
