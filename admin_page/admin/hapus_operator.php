<?php
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id_operator'];


// menghapus data dari database
mysqli_query($koneksi,"delete from data_operator where id_operator='$id'");

// mengalihkan halaman kembali ke index.php
header("location:tabel_operator.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>