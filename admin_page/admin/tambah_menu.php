<?php
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id_menu = $_POST['id_menu'];
$nama_makanan= $_POST['nama_makanan'];
$harga = $_POST['harga'];

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
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		mysqli_query($koneksi,"insert into menu values('','$foto','$nama_makanan','$harga')");
	}else{
		header("location:index.php?alert=salah ukuran");
	}
}
// menginput data ke database


// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>