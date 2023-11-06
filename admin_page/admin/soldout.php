<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_menu'];
$soldout = $_POST['soldout'];

		if ($_POST['soldout'] == 'yes') {
            $_POST['soldout'] = 'yes';
			mysqli_query($koneksi,"update menu set soldout='$soldout' where id_menu='$id'");
			header("location:index.php?alert=berhasil");
		}else{
            $_POST['soldout'] = 'no';
			mysqli_query($koneksi,"update menu set soldout='$soldout' where id_menu='$id'");
			header("location:index.php?alert=berhasil");
		}
		

// mengalihkan halaman kembali ke index.php

?>