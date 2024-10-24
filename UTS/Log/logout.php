<?php
include '../Koneksi/koneksi.php';
session_start();
session_unset();
session_destroy();

if (!isset($_SESSION['pengguna'])) {
    header("Location: login.php");
    exit();
}
?>