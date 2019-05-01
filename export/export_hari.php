<?php
include "conection_js.php";

    // Export_Database($db_host,$db_user,$db_pass,$db_name,  $tables=false, $backup_name=false );

    $query          ="SELECT * FROM absensi where tgl_absensi = current_date";
    $hasil          = mysqli_query($koneksi,$query);

    $content            = (!isset($content) ? '' : $content) . "\n\n"."\n\n";
    $content            .= "\nINSERT INTO absensi (nim, tgl_absensi, waktu_datang, waktu_pulang, waktu_riset, id_sidikjari)"." VALUES\n";

    $total              = mysqli_num_rows($hasil);
    $i                  = 0;
    while ($data = mysqli_fetch_array($hasil)) {
      $content      .= '("'.$data['nim'].'",';
      $content      .= '"'.$data['tgl_absensi'].'",';
      $content      .= '"'.$data['waktu_datang'].'",';
      $content      .= '"'.$data['waktu_pulang'].'",';
      $content      .= '"'.$data['waktu_riset'].'",';
      $content      .= '"'.$data['id_sidikjari'].'"';
      $content      .= ")";
      if(++$i != $total) {
        $content    .= ', ';
      } else {
        $content    .= ';';
      }
    }
    $backup_name = "(".date('d-m-Y').").sql";
    header('Content-Type: application/octet-stream');   
    header("Content-Transfer-Encoding: Binary"); 
    header("Content-disposition: attachment; filename=\"".$backup_name."\"");  
    echo $content; exit;
    ?>