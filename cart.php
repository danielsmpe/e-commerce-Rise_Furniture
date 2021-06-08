<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cart</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/cart.css">
	<link rel="stylesheet" type="text/css" href="styles/Footer.css">
	<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
	<link href='images/logo.png' rel='SHORTCUT ICON' />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP"
	 crossorigin="anonymous">
</head>

<?php 
include 'helper/connection.php';
session_start(); 

$id_customer = $_SESSION['id_customer'];
$query = "SELECT * from customer where id_customer = '$id_customer'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$nama = $row['nama_customer'];

?>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header">
			<div class="header_container bg-info">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="header_content d-flex flex-row align-items-center justify-content-start">
								<div class="logo"><a href="index.php">Rise Store</a></div>
								<nav class="main_nav">
									<ul>
										<li class=""><a href="index.php">Home</a>
										<li class="hassubs">
											<a>Kategori</a>
											<ul>
												<?php
													$query = 
													"SELECT * from kategori order by nama_kategori";
													
													$result = mysqli_query($con, $query);

													if (mysqli_num_rows($result) > 0)
													{
														$index = 1;

														while($row = mysqli_fetch_assoc($result))
														{
															$id_kategori = $row['id_kategori'];
															echo "
																<li><a href='categories.php'>".$row['nama_kategori']."</a></li>
															";
														}
													}
												?>
											</ul>
										</li>
										<li>
										<a href="aboutus.php">about us</a>
										</li>
										<?php if($id_customer != ""){ ?>
										<li>
										<a href="order.php">My Order</a>
										</li>
										<li>
										<a href="admin/process/logout.php">Logout</a>
										</li>
										<?php } 
										else{?>
											<li><a href="admin/index.php">Login</a>
											</li>
											<?php } ?>
									</ul>
								</nav>
								<div class="header_extra ml-auto">
									<div class="shopping_cart">
										<a href="cart.php">
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											 viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
											</svg>
											<div> <img src="styles/img/cart-icon.png" alt=""><span>(
													<?php if(isset($_SESSION["nomor"])){ echo $_SESSION["nomor"]; } else{ echo 0;} ?>)</span></div>
										</a>
									</div>

									<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Social -->
			<div class="header_social">
				<nav class="main_nav">
					<ul>
						<?php if($id_customer == ""){ ?>
						<li><a href="admin/index.php">Login</a>
							<?php }  
						else 
						{?>
						<li class="hassubs">
							<a>Hi!
								<?php echo $nama ?></a>
							<ul>
								<li><a href="admin/process/logout.php">Logout</li>
							</ul>
						</li>
						<?php } ?>
					</ul>
				</nav>
			</div>
		</header>

		<!-- Menu -->

		<div class="menu menu_mm trans_300">
			<div class="menu_container menu_mm">
				<div class="page_menu_content">

					<div class="page_menu_search menu_mm">
						<form action="#">
							<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
						</form>
					</div>
					<ul class="page_menu_nav menu_mm">
						<li class="page_menu_item menu_mm">
							<a href="index.php">Home</a>
						</li>
						<li>
						<a href="aboutus.php">about us</a>
						</li>
						<li class="page_menu_item has-children menu_mm">
							<a href="">Kategori<i class="fa fa-angle-down"></i></a>
							<ul class="page_menu_selection menu_mm">
								<?php
									$query = 
									"SELECT * from kategori order by nama_kategori";
									
									$result = mysqli_query($con, $query);

									if (mysqli_num_rows($result) > 0)
									{
										$index = 1;

										while($row = mysqli_fetch_assoc($result))
										{
											$id_kategori = $row['id_kategori'];
											echo "
												<li class='page_menu_item menu_mm'><a href='categories.php'>".$row['nama_kategori']."</a></li>
											";
										}
									}
								?>
							</ul>
						</li>
						<?php if($id_customer == ""){ ?>
						<li class="page_menu_item menu_mm">
							<a href="admin/index.php">Login</a>
						</li>
						<?php }  
						else 
						{?>
						<li class="page_menu_item has-children menu_mm">
							<a href="categories.html">
								<?php echo $nama; ?><i class="fa fa-angle-down"></i></a>
							<ul class="page_menu_selection menu_mm">
								<li class='page_menu_item menu_mm'><a href='admin/process/logout.php'>Logout</a></li>
							</ul>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>

			<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		</div>

		<!-- Home -->

		<div class="home">
			<div class="home_container">
				<div class="home_background" style="background-image:url(images/transaksi.jpg)"></div>
				<div class="home_content_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_content">
									<div class="breadcrumbs">
										<ul>
											<li><a href="index.php">Home</a></li>
											<li>Shopping Cart</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Cart Info -->

		<br><br>

		<div class="col-lg-8 offset-lg-2">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subharga</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if(isset($_SESSION["keranjang"]))
						{
							$total = 0;
							$nomor = 1;
							foreach ($_SESSION["keranjang"] as $id_produk => $jumlah){
							
							$ambil = $con->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
							$pecah = $ambil->fetch_assoc();
							$subharga =$pecah["harga"]*$jumlah;
							$total += $subharga;
						?>
					<tr>
						<td>
							<?php echo $nomor; ?>
						</td>
						<td>
							<?php echo $pecah['judul_produk']; ?>
						</td>
						<td>Rp.
							<?php echo number_format($pecah['harga']); ?>
						</td>
						<td>
							<?php echo $jumlah; ?>
						</td>
						<td>Rp.
							<?php echo number_format($subharga); ?>
						</td>
						<td width='50px'>
							<div class="button"><a href="process/delete-cart.php?id_produk=<?php echo $id_produk; ?>">Hapus</a></div>
						</td>
					</tr>
					<?php
					$nomor++;
					?>
					<?php }
							}
							else
							{
								echo "
								<tr>
									<td colspan='6'>Tidak Ada Data</td>
								</tr>";
							} ?>
				</tbody>
			</table>

			<br><br>

			<div class="row row_cart_buttons">
				<div class="col">
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="button continue_shopping_button"><a href="index.php#produk">Continue shopping</a></div>
						<?php if(isset($_SESSION["keranjang"])){ ?>
						<div class="cart_buttons_right ml-lg-auto">
							<div class="button clear_cart_button"><a href="process/clear-cart.php">Clear cart</a></div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<br><br>

		<?php if(isset($_SESSION["keranjang"])){ ?>
		<div class="col-lg-8 offset-lg-2">
			<div class="cart_total">
				<div class="cart_total_container">
					<ul>
						<li class="d-flex flex-row align-items-center justify-content-start">
							<div class="cart_total_title">Total</div>
							<div class="cart_total_value ml-auto">Rp.
								<?php echo $total;?>,-</div>
						</li>
					</ul>
				</div>
				<br>
				<div class="button checkout_button"><a href="process/input-cart.php">Proceed to checkout</a></div>
			</div>
		</div>
		<?php } ?>
<br><br>
<?php
    include('footer/footer.php');
?>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/greensock/TweenMax.min.js"></script>
	<script src="plugins/greensock/TimelineMax.min.js"></script>
	<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="plugins/greensock/animation.gsap.min.js"></script>
	<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="js/Backtotop.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="js/cart.js"></script>
</body>

</html>