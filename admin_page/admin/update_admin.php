<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_admin'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];

$rand = rand();
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

		$foto = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'foto_admin/'.$rand.'_'.$filename);
		if (empty($filename)) {
			mysqli_query($koneksi,"update data_admin set nama='$nama', username='$username', password='$password' where id_admin='$id'");
			header("location:tabel_admin.php?alert=berhasil");
		}else if(!empty($filename)){
			mysqli_query($koneksi,"update data_admin set nama='$nama', username='$username', password='$password', foto='$foto' where id_admin='$id'");
			header("location:tabel_admin.php?alert=berhasil");
		}else {
            echo "<script>alert('Gagal mengupdate data')</script>";
        }
		
?>