<?php
  require("fpdf/fpdf.php");
  include "conection.php";
  $month = date('m');
  $thismonth = date('F-Y');

  //Setting Awal
  $pdf = new FPDF('P','cm','A4');
  $pdf->AddPage();
  $pdf->SetFont('Courier','B',8);
  $pdf->SetTitle('Laporan Absensi Bulanan');
  $pdf->AliasNbPages();

  //Header Laporan

  //Tabel Header
  $pdf->Cell(0.7,0.7,'No',1,0,'C');
  $pdf->Cell(1.6,0.7,'NIM',1,0);
  $pdf->Cell(4.7,0.7,'Nama',1,0);
  $pdf->Cell(2,0.7,'Hari',1,0,'C');
  $pdf->Cell(3,0.7,'Tanggal Absensi',1,0,'C');
  $pdf->Cell(2.35,0.7,'Waktu Datang',1,0,'C');
  $pdf->Cell(2.55,0.7,'Status Absensi',1,0,'C');
  $pdf->Cell(2.4,0.7,'Id Sidik Jari',1,0,'C');
  $pdf->ln(0.7);


  //Query Ke Database
  $query="SELECT tb_user.nim, tb_user.nama_anggota, tb_user.id_sidikjari,tgl_absensi, waktu_datang, IF (waktu_datang<='10:00:00','Hadir', IF(waktu_datang<='17:00:00','Telat','Tidak Hadir')) AS status_absensi FROM absensi join tb_user on tb_user.nim = absensi.nim where month(tgl_absensi)=$month order by tgl_absensi ASC";
  $hasil = $koneksi->query($query);
  $no=1;

  //Perulangan Query Ke Database
  while ($data = mysqli_fetch_array($hasil)) {

  //Format Hari dan Tanggal
    $tanggal1 = $data['tgl_absensi'];
    $format1 = date ('d-F-Y', strtotime($tanggal1));
    $hari = date ('l', strtotime($tanggal1));

  //Tabel Isi
    $pdf->Cell(0.7,0.7,$no++.'.',1,0,'C');
    $pdf->Cell(1.6,0.7,$data['nim'],1,0);
    $pdf->Cell(4.7,0.7,$data['nama_anggota'],1,0);
    $pdf->Cell(2,0.7,$hari,1,0);
    $pdf->Cell(3,0.7,$format1,1,0);
    $pdf->Cell(2.35,0.7,$data['waktu_datang'].' WIB',1,0,'R');
    $pdf->Cell(2.55,0.7,$data['status_absensi'],1,0);
    $pdf->Cell(2.4,0.7,$data['id_sidikjari'],1,0,'C');
    $pdf->Ln(0.7);
 }  
    $pdf->Output($thismonth,'I');
?>