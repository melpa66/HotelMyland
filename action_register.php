<?php 
//Tambahkan Koneksi Databases
include 'koneksi.php';

//menerima data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

//mengirim ke databases
mysqli_query($koneksi, "insert into users values('','$username','$password','$role')");

//Sesudah Menginput Di alihkan Ke halaman index
header("location:login.php");
?>