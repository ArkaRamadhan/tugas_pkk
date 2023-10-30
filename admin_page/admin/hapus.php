<?php
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id_buku'];


// menghapus data dari database
mysqli_query($koneksi,"delete from daftar_buku where id_buku='$id'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>