<?php 
//Tambahkan Koneksi Databases
include 'koneksi.php';

//menerima data dari form
$cek_in = $_POST['tanggal_check_in'];
$cek_out = $_POST['tanggal_check_out'];
$jml_kamar = $_POST['jumlah_kamar'];
$tgl_reservasi = $_POST['tanggal_reservasi'];
$ditamu = $_POST['kode_kamar'];
$nama_tamu = $_POST['nama_tamu'];
$email_pemesan = $_POST['email'];
$hp_pemesan = $_POST['handphone'];
$tipe = $_POST['tipe'];

//mengirim ke databases
mysqli_query($koneksi, "insert into pesanan values('','$tgl_reservasi', '$cek_in','$cek_out', '$ditamu', '$nama_tamu', '$email_pemesan','$hp_pemesan','$tipe', '$jml_kamar', '1')");

//Sesudah Menginput Di alihkan Ke halaman index
header("location:index.php");
?>