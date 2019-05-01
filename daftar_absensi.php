<?php 
//call session for this interface
include_once "session/Session.php";
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
                <div class="row">
                  <div class="col-sm-auto">
                    <a href="export/export_hari.php" value="Export/Hari"><button class="btn btn-info"> &nbsp; Export/Hari &nbsp; </button></a>
                  </div>
                  <div class="col-sm-4">
                    <a href="export/export_bulan.php" value="Export/Bulan"><button class="btn btn-info"> &nbsp; Export/Bulan &nbsp; </button></a>
                  </div>
                  <div class="col-sm-auto">
                  </div>
                  <div class="col-sm-auto">
                  </div>
                  <form action="halaman_absensi.php" class="row">
                    <label style="line-height: 2.8;">Start Date</label>
                    <div class="col-sm-auto">
                  <input type="date" name="startfilter" id="startfilter" class="form-control ml-auto mr-0 mr-md-3 my-2 my-md-0" min="2019-01-01" max="2099-12-31" value="<?php echo date("Y-m-d");?>">
                    </div>
                    <label style="line-height: 2.8;">End Date</label>
                    <div class="col-sm-auto">
                    <input type="date" name="endfilter" id="endfilter" class="form-control ml-auto mr-0 mr-md-3 my-2 my-md-0" min="2019-01-01" max="2099-12-31" value="<?php echo date("Y-m-d");?>">
                    </div>
                      <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                      </button>
                  </form>
                </div>
              </div>
            </div>
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
                      <th class="text-center" style="line-height: 2.8;">NIM</th>
                      <th width="180px" class="text-center" style="line-height: 2.8;">Nama</th>
                      <th class="text-center" style="line-height: 2.8;">Hari</th>
                      <th width="125px" style="line-height: 2.8;" class="text-center">Tanggal Absensi</th>
                      <th width="80px" class="text-center">Waktu Datang</th>
                      <th width="80px" class="text-center">Waktu Pulang</th>
                      <th class="text-center" style="line-height: 2.8;">Lama Riset</th>
                      <th class="text-center" style="line-height: 2.8;">Kurang Riset</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    //Make class include to this code
                    include_once "absensi.php";
                      //call class absensi and function get_data()
                      $datas = new Absensi();
                      $data = $datas->Get_data();
                         while ($row = $data->fetch_assoc()){
                          $tanggal1 = $row['tgl_absensi'];
                          $format1 = date ('d-F-Y', strtotime($tanggal1));
                          $lama_riset = $row ['lama_riset'];
                          $kurang_riset = $row['kurang_riset'];
                          $format4= date('H', strtotime($lama_riset));
                          $format5= date('i', strtotime($lama_riset));
                          $format6= substr($kurang_riset,0,-6);
                          $format7= substr($kurang_riset,-5,2);
                          $hari = date ('l', strtotime($tanggal1));
                          echo "
                          <tr>
                            <td>$row[nim]</td>
                            <td>$row[nama_anggota]</td>
                            <td>$hari</td>
                            <td class='text-right'>$format1</td>
                            <td class='text-right'>$row[waktu_datang] WIB</td>
                            <td class='text-right'>$row[waktu_pulang] WIB</td>
                            <td class='text-right'>$format4 Jam $format5 Menit</td>
                            <td class='text-right'>$format6 Jam $format7 Menit</td>
                            </tr>";
                          }
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        <?php include "footer.php";?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!--Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Demo scripts for this page-->
    <script type="text/javascript">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
          $('#dataTable').DataTable({
            "order" :  [[3, "desc"],[4, "desc"] ]
          }); 
        });
    </script>