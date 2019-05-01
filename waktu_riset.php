<?php
	// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    include_once "absensi.php";

    $datas = new Absensi();
    $data = $datas->setwaktu_riset();
?>
<script>
	alert("Waktu Riset Disimpan");
	document.location.href="halaman_absensi.php"
</script>