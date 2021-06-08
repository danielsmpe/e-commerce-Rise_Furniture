<?php
include 'helper/connection.php';
session_start();

$id_produk = $_GET['id_produk'];
$_SESSION['nomor']+=1;

//sudah ada
if(isset($_SESSION['keranjang'][$id_produk]))
{
    $_SESSION['keranjang'][$id_produk]+=1;
    
}
//belum ada
else
{
    $_SESSION['keranjang'][$id_produk] = 1;
}

header("location:../cart.php");

?>