<?php
    // include DB connection file
    include '../../../../../helper/connection.php';

    // mendapatkan nilai dari form
    $id_supplier        = $_POST['id_supplier'];
    $nama_supplier      = $_POST['nama_supplier'];
    $alamat_supplier      = $_POST['alamat_supplier'];
    $email_supplier      = $_POST['email_supplier'];
    $telp_supplier      = $_POST['telp_supplier'];

    $query = "UPDATE supplier SET nama_supplier = '$nama_supplier', alamat_supplier = '$alamat_supplier', email_supplier='$email_supplier', telp_supplier='$telp_supplier' WHERE id_supplier = '$id_supplier'";

    // menjalankan query isi data
    if (mysqli_query($con, $query))
    {
        header("Location:../table_supplier.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil diupdate");
        header("Location:../table_supplier.php?error=$error");
    }

    mysqli_close($con);
?>