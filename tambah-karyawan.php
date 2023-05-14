<?php
//include('dbconnected.php');
include('koneksi.php');

$nama = $_GET['nama'];
$posisi = $_GET['posisi'];
$alamat = $_GET['alamat'];
$umur = $_GET['umur'];
$kontak = $_GET['kontak'];
$pass = $_GET["pass"];

//menambah karyawan
$query = mysqli_query($koneksi, "INSERT INTO `karyawan` ( `nama`, `posisi`, `alamat`, `umur`, `kontak`) VALUES ( '$nama', '$posisi', '$alamat', '$umur', '$kontak')");
//membuat akun karyawan
$query = mysqli_query($koneksi, "INSERT INTO `admin` (nama, email, pass) VALUES ('$nama', '$kontak', '$pass')");

if ($query) {
    # redirect ke page karyawan.php
    header("location:karyawan.php");
} else {
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}

?>