<?php
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  date_default_timezone_set("Asia/Jakarta");
  include "connection/conection_js.php";
  
  $waktu = date ('H:i:s');
//   $waktu = date ('H:i:s', strtotime('08:00:00'));
//   $waktu = date ('H:i:s', strtotime('18:00:00'));
  
	$waktu_datang = [
    'start' => date('H:i:s', strtotime('08:00:00')),
    'end' =>  date('H:i:s', strtotime('11:00:00'))
   ];

   $waktu_pulang = [
    'start' => date('H:i:s',  strtotime('17:00:00')),
    'end' =>  date('H:i:s', strtotime('20:00:00'))
   ];

   if(((($waktu-$waktu_datang['start']) >= 0  && ($waktu-$waktu_datang['start']) <= 3)) && (($waktu-$waktu_pulang['start']) >= 0  && ($waktu-$waktu_pulang['start']) <= 3)) {
    return false;
   }
   $today = date('Y-m-d');

  /* Data dari arduino */
    
    $id=$_GET["idjari"];
    // $id="3";

  /* Mengambil nim berdasarkan id*/
    $selectnim= "SELECT nim, nama_anggota, status_absensi FROM tb_anggota where id_sidikjari='$id'";
    $cek = mysqli_query($koneksi,$selectnim);
    while ($data = mysqli_fetch_array($cek)) {
     $nim = $data['nim'];
     echo $data['nama_anggota'];
     echo "<br>";
    }
       $query = "SELECT nim, tgl_absensi, waktu_pulang FROM absensi where nim = '$nim' AND tgl_absensi=current_date";
       $cek1  = mysqli_query($koneksi, $query);
       $zz    = mysqli_fetch_array($cek1);

       $query = "SELECT waktu_riset FROM tb_riset ORDER by id_riset DESC LIMIT 1";
       $cek2  = mysqli_query($koneksi, $query);
       $xx    = mysqli_fetch_array($cek2);

       $wktu  = $xx['waktu_riset'];
       $lama  = date ('H:i:s', strtotime('00:00:00'));

   if((($waktu-$waktu_datang['start']) >= 0  && ($waktu-$waktu_datang['start']) <= 3) AND ($zz['tgl_absensi']!=$today)) {
      $insert = "UPDATE tb_anggota set status_absensi='Hadir' where id_sidikjari='$id';";
      $insert .= "INSERT INTO absensi (nim,tgl_absensi, waktu_datang, lama_riset, waktu_riset, id_sidikjari) VALUES ($nim,current_date,current_time,'$lama', '$wktu', $id)";
   } else {
      if((($waktu-$waktu_pulang['start']) >= 0  && ($waktu-$waktu_pulang['start']) <= 3) AND ($zz['waktu_pulang']=='00:00:00')) {
        $insert = "UPDATE tb_anggota set status_absensi='Tidak hadir' where id_sidikjari='$id';";
        $insert .= "UPDATE absensi SET waktu_pulang=current_time, lama_riset=timediff(waktu_pulang,waktu_datang) where id_sidikjari='$id' and tgl_absensi=current_date";
      }
  }
    mysqli_multi_query($koneksi,$insert);
    ?>