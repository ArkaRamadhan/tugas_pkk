<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_operator'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:index.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){
		$foto = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'foto_operator/'.$rand.'_'.$filename);
		mysqli_query($koneksi,"insert into data_operator values('', '$nama','$username','$password','$foto')");
		header("location:index.php?alert=berhasil");
	}else{
		header("location:index.php?alert=salah ukuran");
	}
}
// menginput data ke database


// mengalihkan halaman kembali ke index.php

header("location:tabel_operator.php");

?>