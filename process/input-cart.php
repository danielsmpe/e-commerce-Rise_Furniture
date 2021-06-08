<?php
include '../helper/connection.php';
session_start();

if($_SESSION['id_customer'] == '')
{
    header('location:../admin/index.php');
}
else
{
    $tampilkan_isi = "select count(id_transaksi) as jumlah from transaksi";
    $tampilkan_isi_sql = mysqli_query($con,$tampilkan_isi);
    $no = 1;
    while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
    {
        $no=$no+$isi['jumlah'];
    }

    foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
    {
        $ambil = $con->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
        $pecah = $ambil->fetch_assoc();
        $id_produk = $pecah["id_produk"];
        $subharga =$pecah["harga"]*$jumlah;
        $id_customer = $_SESSION['id_customer'];

        $query = $con->query("INSERT INTO transaksi (id_transaksi, id_customer, id_produk, tgl_transaksi, jumlah, total) VALUES ('TR-$no', '$id_customer','$id_produk',now(), $jumlah, $subharga)");
        
        if($query)
        {
            $newqty = $pecah['stok'] - $jumlah;
            $con->query("UPDATE produk SET stok = $newqty WHERE id_produk = '$id_produk'");
        }
        else
        {
            echo "<script>alert('tranksaksi gagal!');</script>";
        }

        $no++;
    }

    unset($_SESSION['keranjang']);
    unset($_SESSION['nomor']);
    header('location:../order.php');
}
?>