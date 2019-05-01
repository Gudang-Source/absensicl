<?php
	include "connection/conection_js.php";

	$query="Select * From tb_anggota where status='false' order by tgl_daftar desc limit 1"; 
	$hasil= mysqli_query ($koneksi,$query);
	$data = mysqli_fetch_array ($hasil);

    $last_register_nim = $data['nim'];
    $last_register_id = $data['id_sidikjari'];

    $return = new \stdClass();
    $return->status = false;

    if($last_register_nim != NULL && $last_register_id != NULL){
    	$return->status = true;
    	$return->nim = $last_register_nim;
    	$return->id = $last_register_id;
    }

    echo json_encode($return);
?>