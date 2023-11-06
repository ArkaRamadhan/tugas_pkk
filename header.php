<?php
include 'koneksi.php';
require_once('header.php');
require_once('cart_aksi.php');
session_start();

if (isset($_POST['add_to_cart'])) {

    if (isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'], "id_menu");

        if (in_array($_POST['id_menu'], $item_array_id)) {
            echo "<script>alert('product sudah ditambahkan')</script>";
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

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if($value['id_menu'] == $_GET['id_menu']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert(Product berhasil di hapus)</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Header</title>
</head>

<body>

</body>

</html>

<header>
    <a href="#" class="logo"><i class="fas fa-utensils"></i>PIKA.</a>

    <nav class="navbar">
        <a href="#home" class="active text-decoration-none">home</a>
        <a href="#dishes" class="text-decoration-none">dishes</a>
        <a href="#about" class="text-decoration-none">about</a>
        <a href="#menu" class="text-decoration-none">menu</a>
        <a href="#review" class="text-decoration-none">review</a>
        <a href="#order" class="text-decoration-none">order</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="#" class="fas fa-heart text-decoration-none"></a>
        <a href="cart.php" class="fas fa-shopping-cart text-decoration-none" id="cart" data-toggle-sidebar="sidebar1">
            <?php

            include 'koneksi.php';

            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
                echo "<span id='jumlah'>$count</span>";
            } else {
                echo "<span id='jumlah'>0</span>";
            }
            ?>
        </a>
        <div class="dropdown">
            <i class="dropbtn fa-solid fa-user"></i>
            <div id="myDropdown" class="dropdown-content">
                <a href="logout.php" class="logout">Logout</a>
            </div>
            </a>
        </div>
</header>