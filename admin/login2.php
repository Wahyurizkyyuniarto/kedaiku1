<?php
// untuk memasukkan file koneksi.php
include "../lib/koneksi.php";
// menangkap variabel POST dari form login / index.php
$username = $_POST['username'];
$pass = $_POST['password'];
// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)) {
    echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
    echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
} else {
    $login = mysql_query("SELECT * FROM tbl_admin WHERE username='$username' AND password='$pass'");
    $ketemu = mysql_num_rows($login);
    $r = mysql_fetch_array($login);

    // Apabila username dan password ditemukan
    if ($ketemu > 0) {
        session_start();

        $_SESSION[namauser] = $r[username];
        $_SESSION[passuser] = $r[password];

        header('location:adminweb.php?module=home');
    } else {
        echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
        echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
    }
}
?>
