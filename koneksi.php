<?php
$conn = mysqli_connect("localhost","root","");
if (! $conn) die ("Gagal Terhubung Ke Database");
mysqli_select_db($conn, "login") ;
?>
