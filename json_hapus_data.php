<?php
    include "connection/conection_js.php";

    $id = $_GET['idjari'];
    $delete="delete from tb_anggota where id_sidikjari='$id'" ; 

    $hasil=mysqli_query ($koneksi,$delete);
    $data = mysqli_fetch_array ($hasil);
    var_dump($delete);
?>