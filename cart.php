<?php
include 'koneksi.php';
require_once('header.php');
require_once('cart_aksi.php');


if (isset($_POST['add_to_cart'])) {

    if (isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'], "id_menu");

        if (in_array($_POST['id_menu'], $item_array_id)) {
        } else {

            $count = count($_SESSION['cart']);
            $item_array = array(
                'id_menu' => $_POST['id_menu']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    } else {
        $item_array = array(
            'id_menu' => $_POST['id_menu']
        );

        $_SESSION['cart'][0] = $item_array;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body style="margin-top: 9rem;">

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>MY CART</h6>
                    <hr>
                    <?php

                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        $id_menu = array_column($_SESSION['cart'], 'id_menu');

                        $result = mysqli_query($koneksi, "select * from menu where soldout='no'");
                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($id_menu as $id) {
                                if ($row["id_menu"] == $id) {
                                    cartElement($row['foto'], $row['nama_makanan'], $row['harga'], $row['id_menu']);
                                    $total = $total + (int)$row['harga'];
                                }
                            }
                        }
                    } else {
                        echo "<h5>Cart is empty</h5>";
                    }

                    ?>
                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

                <div class="pt-4">
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php

                            if (isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            } else {
                                echo "<h6>Price (0 items)</h6>";
                            }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                            <?php
									include 'koneksi.php';
									$data = mysqli_query($koneksi, "select * from menu where id_menu='$id'");
									$nomor = 1;
									while ($d = mysqli_fetch_array($data)) {
									?>
                            <form action="checkout.php" method="post">
                            <input type="hidden" value="<?php $row['id_menu'] ?>" name='id_menu'>
                            <input type="hidden" value="<?php $row['foto'] ?>" name='foto'>
                            <input type="hidden" value="<?php $row['nama_makanan'] ?>" name='nama_makanan'>
                            <input type="hidden" value="<?php $row['harga'] ?>" name='harga'>
                            <input type="submit" value="CHECKOUT" class='btn btn-danger mb-4'>
                            </form>
                            <?php
                                    }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <h6>Rp.<?php echo $total;?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>Rp.<?php
                                echo $total
                            ?></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>