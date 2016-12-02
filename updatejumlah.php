<?php
include "config.php";
$conn = mysqli_connect($HOST,$USER_NAME,$PASSWORD) ;
if (! $conn) die("tidak bisa koneksi ke database");
mysqli_select_db($conn, $DB);

$id = $_GET['id'];
$jml = $_GET['jml'];
$harga = mysqli_query($conn, "select tabelbarang.harga from tabelbarang, tabelpesan
where tabelbarang.kode=tabelpesan.idproduk and tabelpesan.nomor=$id");
$h = mysqli_fetch_array($harga);
$harganya = $h['harga'];
$hargabaru = $harganya*$jml;
$update = mysqli_query($conn, "update tabelpesan set jumlah=$jml, harga=$hargabaru where nomor=$id");
if($update){
    $ambil = mysqli_query($conn, "select harga from tabelpesan where nomor=$id");
    $a = mysqli_fetch_array($ambil);
    echo $a['harga'];
}else{
    echo "error";
}
?>
