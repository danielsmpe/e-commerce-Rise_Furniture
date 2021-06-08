<?php
    // include DB connection file
    include '../../../../../helper/connection.php';

    // mendapatkan nilai dari form
    $id_supplier        = $_POST['id_supplier'];
    $nama_supplier    = $_POST['nama_supplier'];
    $alamat_supplier      = $_POST['alamat_supplier'];
    $email_supplier      = $_POST['email_supplier'];
    $telp_supplier      = $_POST['telp_supplier'];

    $query = "INSERT INTO supplier VALUES ('$id_supplier','$nama_supplier','$alamat_supplier','$email_supplier','$telp_supplier',0)";

    // menjalankan query isi data
    if (mysqli_query($con, $query))
    {
        header("Location:../table_supplier.php");
    }
    else
    {
        $error = urldecode("Data tidak berhasil ditambahkan");
        header("Location:../table_supplier.php?error=$error");
    }

    mysqli_close($con);
?>