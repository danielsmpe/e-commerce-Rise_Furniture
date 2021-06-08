<?php
    // include DB connection file
    include '../../../../../helper/connection.php';

    // mendapatkan nilai dari form
    $id_supplier = $_GET['id_supplier'];

    $query = "UPDATE supplier SET deleted = 1 WHERE id_supplier = '$id_supplier'";

    // menjalankan query isi data
    if (mysqli_query($con, $query))
    {
        header("Location:../table_supplier.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil dihapus");
        header("Location:../table_supplier.php?error=$error");
    }

    mysqli_close($con);
?>