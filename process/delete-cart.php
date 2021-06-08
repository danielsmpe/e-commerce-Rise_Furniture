<?php 
session_start();
$id_produk = $_GET["id_produk"];

$jumlahx = 0;

foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
{
	$jumlahx++;
}

if($jumlahx == 1)
{
    unset($_SESSION['keranjang']);
    unset($_SESSION['nomor']); 
}
else
{
    unset($_SESSION["keranjang"][$id_produk]);
}

header('location:../cart.php');
?>