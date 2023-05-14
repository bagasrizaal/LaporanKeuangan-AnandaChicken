<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id_pengeluaran'];

//query update tabel pengeluaran
$query = mysqli_query($koneksi,"DELETE FROM `pengeluaran` WHERE id_pengeluaran = '$id'");

if ($query) {
 # redirect ke page index
 header("location:pengeluaran.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>