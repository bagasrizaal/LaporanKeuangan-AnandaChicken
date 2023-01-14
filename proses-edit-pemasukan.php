<?php

session_start();

include('koneksi.php');

define('LOG', 'log.txt');
function write_log($log)
{
    $time = @date('[Y-d-m:H:i:s]');
    $op = $time . ' ' . $log . "\n" . PHP_EOL;
    $fp = @fopen(LOG, 'a');
    $write = @fwrite($fp, $op);
    @fclose($fp);
}

$id = (int) $_GET['id_pemasukan'];
$tgl = $_GET['tgl_pemasukan'];
$tgl_masuk = date('Y-m-d', strtotime($tgl));
$jumlah = abs((int) $_GET['jumlah']);
$sumber = abs((int) $_GET['id_sumber']);

//query update
$query = mysqli_query($koneksi, "UPDATE pemasukan SET tgl_pemasukan='$tgl_masuk' , jumlah='$jumlah', id_sumber='$sumber' WHERE id_pemasukan='$id' ");

$namaadmin = $_SESSION['nama'];
if ($query) {
    write_log("UPDATE pemasukan SET tgl_pemasukan='$tgl' , jumlah='$jumlah', id_sumber='$sumber' WHERE id_pemasukan='$id'");
    
    // write_log("Nama Admin : " . $namaadmin . " => Edit Pemasukan => " . $id . " => Sukses Edit");
    # redirect ke page index
    header("location:pendapatan.php");
} else {
    write_log("Nama Admin : " . $namaadmin . " => Edit Pemasukan => " . $id . " => Gagal Edit");
    echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
}

//mysql_close($host);
?>