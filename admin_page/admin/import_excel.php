<br/><br/>
<?php
include 'koneksi.php';
?>

<form method="post" enctype="multipart/form-data" action="import_aksi.php">
	Pilih File:
	<input name="excel" type="file" required="required">
	<input name="upload" type="submit" value="Import">
</form>

<br/><br/>


</body>
</html>