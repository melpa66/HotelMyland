<?php 
	include '../koneksi.php';

	$id_fasilitas = $_GET['id'];

	$query ="DELETE FROM tipe_kamar WHERE id = '$id_fasilitas'";
	mysqli_query ($koneksi, $query);

	header("location:fasilitas_kamar.php");

 ?>