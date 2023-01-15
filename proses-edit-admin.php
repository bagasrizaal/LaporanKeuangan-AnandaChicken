<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id_admin'];
$nama = $_GET['nama'];
$email = $_GET['email'];
$pass = $_GET['pass'];

//query update tabel admin
$query = mysqli_query($koneksi,"UPDATE admin SET nama='$nama' , email='$email', pass='$pass' WHERE id_admin='$id' ");
//query edit tabel karyawan
$query = mysqli_query($koneksi,"UPDATE karyawan SET nama='$nama' , kontak='$email' WHERE id_karyawan='$id' ");
if ($query) {
 # credirect ke page index
 header("location:profile.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($Koneksi);
}

//mysql_close($host);
?>