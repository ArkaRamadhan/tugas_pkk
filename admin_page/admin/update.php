<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_buku'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun_terbit = $_POST['tahun_terbit'];
$genre = $_POST['genre'];
$sinopsis = $_POST['sinopsis'];
$no_isbn = $_POST['no_isbn'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

		$foto = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
		if (empty($filename)) {
			mysqli_query($koneksi,"update daftar_buku set judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', genre='$genre', sinopsis='$sinopsis', no_isbn='$no_isbn' where id_buku='$id'");
			header("location:index.php?alert=berhasil");
		}else{
			mysqli_query($koneksi,"update daftar_buku set judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', genre='$genre', sinopsis='$sinopsis', no_isbn='$no_isbn', foto='$foto' where id_buku='$id'");
			header("location:index.php?alert=berhasil");
		}
		

// mengalihkan halaman kembali ke index.php

?>