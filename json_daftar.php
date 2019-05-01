<?php
	include "connection/conection_js.php";

	$id =$_GET['idjari'];
	$nimdaftar =$_GET['nim'];

	$insert = "INSERT INTO tb_anggota (nim,id_sidikjari) VALUES ('$nimdaftar','$id')"; 
	mysqli_query($koneksi,$insert);
	var_dump($insert);
?>