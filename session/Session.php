<?php
  	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	date_default_timezone_set("Asia/Jakarta");
	include "connection/conection.php";

	//session start
	session_start();
	$username=$_SESSION["username"];
	if($_SESSION["username"]==''){
	  ?>
	   <script>
	   alert(' Anda Belum Login, Silahkan Login ! ');
	   window.open('index.php','_self');
	   </script>
	  <?php
  	}
?>