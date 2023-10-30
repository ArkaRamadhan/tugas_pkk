<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>

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
			<td><img src="gambar/<?php echo $data['foto'] ?>" width="35" height="40"></td>
		</tr>
		<?php
		}
		?>
	</table>

	<script>
		window.print();
	</script>
 
</body>
</html