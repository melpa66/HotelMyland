<?php 
//menambahkan koneksi
include '../koneksi.php';

//menangkap data yang di kirim dari url
$id_fasilitas=$_GET['id'];

//menghapus data dari tabel databases
mysqli_query($koneksi, "delete from fasilitas_umum where id='$id_fasilitas'");
//mengalihkan ke halaman index setelah berhasil menghapus
header("location:fasilitas.php");
?>