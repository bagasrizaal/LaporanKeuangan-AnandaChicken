<?php
include('koneksi.php');
// mengambil data dengan name input_catatan di html pendapatan.php
$catatan = $_GET['input_catatan'];
// jika input catatan kosong
if($catatan ==""){
    $catatan = 'Tidak ada Catatan.';
}
//query update catatan
// id catatan 2 = pengeluaran
$query = mysqli_query($koneksi," UPDATE `catatan` SET catatan='$catatan' WHERE id_catatan=2");

if ($query) {
 # credirect ke page index
 header("location:pengeluaran.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>