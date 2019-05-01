      <?php
        include "conection.php";
      ?>
<div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Absensi</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
             <div class="bg-white">
                <div class="small text-muted text-left">
                  <a href="export_hari.php" class="texttambah fadeIn animated" value="Export/Hari"><button class="btn btn-info"> &nbsp; Export/Hari &nbsp; </button></a>
                  <a href="export_bulan.php" class="texttambah fadeIn animated" value="Export/Bulan"><button class="btn btn-info"> &nbsp; Export/Bulan &nbsp; </button></a>
                </div>
              </div>
              <br>
          <!-- Data Absensi -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Absensi</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                  <thead>
                    <tr>
                      <th class="text-center" hidden="hidden">ID_Absensi</th>
                      <th class="text-center">NIM</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Hari</th>
                      <th class="text-center">Tanggal Absensi</th>
                      <th class="text-center">Waktu Datang</th>
                      <th class="text-center">Waktu Pulang</th>
                      <th class="text-center">Lama Riset</th>
                      <th class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $cari = $_POST['cari'];
                    if ($cari) 
                     { 
                      $query="SELECT absensi.idabsensi, tb_user.nim, tb_user.nama_anggota,tgl_absensi, waktu_datang, IF (waktu_datang<='11:00:00','Hadir','Tidak Hadir') AS status_absensi,waktu_pulang, timediff (waktu_pulang,waktu_datang) AS lama_riset, tb_user.id_sidikjari FROM absensi join tb_user on tb_user.id_sidikjari = absensi.id_sidikjari where nama_anggota like '%$cari%' order by tgl_absensi asc";
                      $hasil =mysqli_query($koneksi,$query);
                      while ($data = mysqli_fetch_array($hasil)) {
                        $tanggal1 = $data['tgl_absensi'];
                        $format1 = date ('d-F-Y', strtotime($tanggal1));
                        $lama_riset = $data ['lama_riset'];
                        $format4= date('H', strtotime($lama_riset));
                        $format5= date('i', strtotime($lama_riset));
                        $hari = date ('l', strtotime($tanggal1));
                        echo "
                      <tr>
                        <td hidden='hidden'>$data[idabsensi]</td>
                        <td>$data[nim]</td>
                        <td>$data[nama_anggota]</td>
                        <td>$hari</td>
                        <td>$format1</td>
                        <td class='text-right'>$data[waktu_datang] WIB</td>
                        <td class='text-right'>$data[waktu_pulang] WIB</td>
                        <td class='text-right'>$format4 Jam $format5 Menit</td>
                        <td>$data[status_absensi]</td>
                      </tr>";
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
            <div class="card-header">
              <div class="small text-muted text-right">
                <?php echo date('d-F-Y H:i:s') ?>
              </div>
            </div> 