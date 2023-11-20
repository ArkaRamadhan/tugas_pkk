<?php
include 'header.php';
require_once('checkout_aksi.php')

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.display-order {
			max-width: 50rem;
			border-radius: .5rem;
			text-align: center;
			padding: 1.5rem;
			margin: 0 auto;
			margin-bottom: 2rem;
			width: 10rem;
			height: 10rem;
		}

		.display-order h1 {
			display: inline-block;
			border-radius: .5rem;
			background-color: var(--bg-color);
			padding: .5rem 1.5rem;
			font-size: 2rem;
			color: var(--black);
			margin: .5rem;
		}

	</style>
</head>

<body style="margin-top: 7rem;">
	<section class="order" id="order">

		<h3 class="sub-heading"> order now </h3>
		<h1 class="heading"> free and fast </h1>

		<form action="">

			<?php

			$total = 0;
			$jumlah = 1;
			if (isset($_SESSION['cart'])) {
				$id_menu = array_column($_SESSION['cart'], 'id_menu');

				$result = mysqli_query($koneksi, "select * from menu");
				while ($row = mysqli_fetch_assoc($result)) {
					foreach ($id_menu as $id) {
						if ($row["id_menu"] == $id) {
							cartElemen($row['foto'], $row['nama_makanan'], $row['harga'], $row['id_menu']);
							$jumlah_total = $row['harga'] * $jumlah;
							$grand_total = $total += $jumlah_total;

			?>

								<span class="display-order">
									<h1><?php echo $row['nama_makanan']; ?></h1>
								
				<?php
						}
					}
				}
			}
				?>
				<br>
				<span class="grand-total"> grand total : Rp.<?php echo $total; ?> </span>
				</span>



							<div class="inputBox">
								<div class="input">
									<span>your name</span>
									<input type="text" name="" placeholder="enter your name">
								</div>
								<div class="input">
									<span>your number</span>
									<input type="number" name="" placeholder="enter your number">
								</div>
							</div>

							<div class="inputBox">
								<div class="input">
									<span>your order</span>
									<input type="text" name="" placeholder="enter food name">
								</div>
								<div class="input">
									<span>additional food</span>
									<input type="text" name="" placeholder="extra with food">
								</div>
							</div>

							<div class="inputBox">
								<div class="input">
									<span>how much</span>
									<input type="number" name="" placeholder="how many orders">
								</div>
								<div class="input">
									<span>date and time</span>
									<input type="datetime-local">
								</div>
							</div>

							<div class="inputBox">
								<div class="input">
									<span>your address</span>
									<textarea name="" id="" placeholder="enter your address" cols="30" rows="10"></textarea>
								</div>
								<div class="input">
									<span>your message</span>
									<textarea name="" id="" placeholder="enter your message" cols="30" rows="10"></textarea>
								</div>
							</div>

							<input type="submit" value="order now" class="btn">

		</form>

	</section>
</body>

</html>