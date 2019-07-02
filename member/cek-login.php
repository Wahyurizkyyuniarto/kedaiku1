
<!-- mulai COding Body -->
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
    echo "<a href=../login.php><b>ULANGI LAGI</b></a></center>";
} else {
    $login = mysqli_query($connection, "SELECT * FROM pelanggan WHERE username='$username' AND password='$pass'");
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);

    // Apabila username dan password ditemukan
    if ($ketemu > 0) {
        session_start();

        $_SESSION[pelanggan] = $r[id_pelanggan];
        $_SESSION[namauser] = $r[username];
        $_SESSION[passuser] = $r[password];
		$_SESSION[nama] = $r[nama];
		$_SESSION[alamat] = $r[alamat];
		$_SESSION[email] = $r[email];
		$_SESSION[no_hp] = $r[no_hp];
        header('location:index.php');
    } else {
        echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
        echo "<a href=../login.php><b>ULANGI LAGI</b></a></center>";
    }
}
?>

<!--END COding Body -->
