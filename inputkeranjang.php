<?php
session_start();
if(!isset($_SESSION['username'])){
    $username = $_POST['username'];
    $_SESSION['transaksi'] = $username;
}

if(!isset($_SESSION['transaksi'])){
    $idt = date("YmdHis");
    $_SESSION['transaksi'] = $idt;
}

$iduser = $_SESSION['username'];
$idtransaksi = $_SESSION['transaksi'];
$kode = $_GET['kode'];
if(!isset($kode)){
    die("tidak ada transaksi");
}

include "config.php";
$conn = mysqli_connect($HOST,$USER_NAME,$PASSWORD) ;
if (! $conn) die("tidak bisa koneksi ke database");
mysqli_select_db($conn, $DB);

$pakaian = mysqli_query($conn, "select * from tabelbarang where kode=$kode");
$b = mysqli_fetch_array($pakaian);
$harga = $b['harga'];

$masuk = mysqli_query($conn, "insert into tabelpesan values(null, '$iduser','$idtransaksi',$kode,1,$harga)");
if($masuk){
    header("location:keranjang.php");
}else{
    echo "error";
}
?>
