<?php
    //include('dbconnected.php');
    include('koneksi.php');

    $id = $_GET['id_karyawan'];

    //query update tabel karyawan
    $query = mysqli_query($koneksi,"DELETE FROM `karyawan` WHERE id_karyawan = '$id'");
    //query update tabel admin
    $query = mysqli_query($koneksi,"DELETE FROM `admin` WHERE id_admin = '$id'");

    if ($query) {
    # credirect ke page index
    header("location:karyawan.php"); 
    }
    else{
    echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
    }

    //mysql_close($host);
?>