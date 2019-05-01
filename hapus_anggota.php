<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    include_once "dashboard.php";

    $datas = new Dashboard();
    $data = $datas->Delete();
?>
<script>
	alert("Data Berhasil Dihapus");
	document.location.href="halaman_anggota.php"
</script>