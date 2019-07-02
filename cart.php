<?php
require_once("lib/koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
    }
     
    if (isset($_GET['act']) && isset($_GET['ref'])) {
        $act = $_GET['act'];
        $ref = $_GET['ref'];
             
        if ($act == "add") {
            if (isset($_GET['id_barang'])) {
                $id_barang = $_GET['id_barang'];
                if (isset($_SESSION['items'][$id_barang])) {
                    $_SESSION['items'][$id_barang] += 1;
                } else {
                    $_SESSION['items'][$id_barang] = 1; 
                }
            }
        } elseif ($act == "plus") {
            if (isset($_GET['id_barang'])) {
                $id_barang = $_GET['id_barang'];
                if (isset($_SESSION['items'][$id_barang])) {
                    $_SESSION['items'][$id_barang] += 1;
                }
            }
        } elseif ($act == "min") {
            if (isset($_GET['id_barang'])) {
                $id_barang = $_GET['id_barang'];
                if (isset($_SESSION['items'][$id_barang])) {
                    $_SESSION['items'][$id_barang] -= 1;
                }
            }
        } elseif ($act == "del") {
            if (isset($_GET['id_barang'])) {
                $id_barang = $_GET['id_barang'];
                if (isset($_SESSION['items'][$id_barang])) {
                    unset($_SESSION['items'][$id_barang]);
                }
            }
        } elseif ($act == "clear") {
            if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $key => $val) {
                    unset($_SESSION['items'][$key]);
                }
                unset($_SESSION['items']);
            }
        } 
         
        header ("location:" . $ref);
    }
?>