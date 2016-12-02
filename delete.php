<?php
include "config.php";
$conn = mysqli_connect($HOST,$USER_NAME,$PASSWORD); 
if (! $conn) die("tidak bisa koneksi ke database");
mysqli_select_db($conn, $DB);

$id = $_GET['id'];

$del = mysqli_query($conn, "delete from tabelpesan where nomor=$id");
if($del){
    header("location:keranjang.php");
}else{
    echo "error";
}
?>
