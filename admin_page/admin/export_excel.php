<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Siswa.xls");
	?>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN BARANG</h2>
		<h4>WWW.MALASNGODING.COM</h4>
 
	</center>
 
	<?php 
	include 'koneksi.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
            <th>No</th>
            <th>Judul buku</th>
            <th>penulis</th>
            <th>Penerbit</th>
            <th>Tahun terbit</th>
            <th>Genre</th>
            <th>Sinopsis</th>
            <th>No ISBN</th>
		</tr>
		<?php
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from daftar_buku");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['judul']; ?></td>
            <td><?php echo $data['penulis']; ?></td>
            <td><?php echo $data['penerbit']; ?></td>
            <td><?php echo $data['tahun_terbit']; ?></td>
            <td><?php echo $data['genre']; ?></td>
            <td><?php echo $data['sinopsis']; ?></td>
            <td><?php echo $data['no_isbn']; ?></td>
		</tr>
		<?php
		}
		?>
	</table>

</body>
</html