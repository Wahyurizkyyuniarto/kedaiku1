<?php
// definisikan koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "panti2";

// Koneksi dan memilih database di server

$connection= mysqli_connect($server,$username,$password, $database) or die(mysqli_error("error koneksi database"));

?>