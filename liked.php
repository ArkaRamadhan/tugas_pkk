<?php

include 'koneksi.php';
require_once('header.php');

$img = mysqli_query($koneksi, "select * from menu");
$a = mysqli_fetch_array($img);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/style.css">
    <title>Liked</title>
</head>

<body style="margin-top: 10rem;">
    <?php
    include 'koneksi.php';

    $details = mysqli_query($koneksi, "select * from liked");
    
    $cek = mysqli_num_rows($details);

    if ($cek > 0) {
        while ($d = mysqli_fetch_assoc($details)) {
            $id_menu = $d['id_menu'];
            $nama_makanan = $d['nama_makanan'];
            $harga = $d['harga'];
    ?>
            <section class="dishes" id="dishes">
                <div class="box-container">
                    <div class="box">
                        <a href="liked.php?id_menu=<?php echo $d['id_menu']; ?>" name='liked' class="fas fa-heart"><input type="submit" value="" name="liked"></a>

                        <img src="admin/gambar/<?php echo $a['foto']; ?>" alt="">
                        <h3> <?php echo $d['nama_makanan']; ?></h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span>Rp. <?php echo $d['harga'];; ?></span>
                        <!-- <input type="submit" class="btn" name="add_to_cart" value="add to cart"> -->
                        <input type="hidden" name="id_menu" value='<?= $d['id_menu'] ?>'>
                        <button type="submit" class="btn" name="add_to_cart">add to cart</button>
                    </div>
</body>
</section>
<?php
        }
    }
?>

</html>