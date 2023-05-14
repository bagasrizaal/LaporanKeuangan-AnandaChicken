<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id_pemasukan'];

//query update tabel pemasukan
$query = mysqli_query($koneksi,"DELETE FROM `pemasukan` WHERE id_pemasukan = '$id'");

if ($query) {
 # redirect ke page index
 header("location:pendapatan.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>