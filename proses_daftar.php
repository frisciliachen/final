<?php
include "koneksi.php";
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
if (empty($firstname)){
echo "<script>alert('Nama Depan belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=find.html'>";
}else
if (empty($lastname)){
echo "<script>alert('Nama Belakang belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=find.html'>";
}else
if (empty($username)){
echo "<script>alert('Username belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=find.html'>";
}else
if (empty($password)){
echo "<script>alert('Password belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=find.html'>";
}else
if (empty($email)){
echo "<script>alert('Email belum diisi')</script>";
echo "<meta http-equiv='refresh' content='1 url=find.html'>";
}else{
$daftar = mysqli_query($conn, "INSERT INTO users (id_user,firstname,username,password,email) values ('$firstname','$lastname','$username','$password','$email')");
if ($daftar){
echo "<script>alert('Berhasil Mendaftar')</script>";
echo "<meta http-equiv='refresh' content='1 url=index1.php'>";
}else{
echo "<script>alert('Gagal Mendaftar')</script>";
echo "<meta http-equiv='refresh' content='1 url=find.html'>";
}
}
?>
