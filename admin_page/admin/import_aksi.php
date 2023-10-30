<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
include "Spreadsheet_Excel_Reader.php"
?>
 
<?php
// upload file xls
$target = basename($_FILES['excel']['name']) ;
move_uploaded_file($_FILES['excel']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['excel']['name'],0777);
 

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['excel']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing

    $judul = $data->val($i, 1);
    $penulis = $data->val($i, 2);
    $penerbit = $data->val($i, 3);
    $tahun_terbit = $data->val($i, 4);
    $genre = $data->val($i, 5);
    $sinopsis = $data->val($i, 6);
    $no_isbn = $data->val($i, 7);
 
	if($judul != "" && $penulis != "" && $penerbit != "" && $tahun_terbit != "" && $genre != "" && $sinopsis != "" && $no_isbn != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into daftar_buku values('','$judul','$penulis','$penerbit', '$tahun_terbit', '$genre', '$sinopsis', '$no_isbn')");
		$berhasil++;
	}
}
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['excel']['name']);
 
// alihkan halaman ke index.php
header("location:admin/index.php?berhasil=$berhasil");


?>