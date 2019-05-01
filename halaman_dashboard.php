<?php 
//call session for this interface
include_once "session/Session.php";
?>
<html>
  <head>
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles-->
    <link href="css.css" rel="stylesheet">
  </head>
  <body id="page-top" class="sidebar-toggled">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="halaman_dashboard.php">Dashboard</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
    </nav>
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav toggled">
        <li class="nav-item active">
          <a class="nav-link" href="halaman_dashboard.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="halaman_anggota.php">
            <i class="fas fa-user-cog"></i>
            <span>Anggota</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="halaman_absensi.php">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Absensi</span></a>
        </li>
        <li class="nav-item">
              <a class="nav-link" href="halaman_piket.php">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Piket</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa fa-cog"></i>
            <span>Setting</span></a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-item">Waktu Riset</h6>
            <form action="waktu_riset.php" method="get">
              <a class="dropdown-item">
                <select class="form-control" name="wakturiset" id="wakturiset" >
                  <option value="02:00:00">2 jam</option>
                  <option value="03:00:00">3 jam</option>
                  <option value="04:00:00">4 jam</option>
                  <option value="05:00:00">5 jam</option>
                  <option value="06:00:00">6 jam</option>
                  <option value="07:00:00">7 jam</option>
                  <option value="08:00:00">8 jam</option>
                  <option value="09:00:00">9 jam</option>
                  <option value="10:00:00">10 jam</option>
                  <option value="11:00:00">11 jam</option>
                  <option value="12:00:00">12 jam</option>
                </select>
              </a>
              <a class="dropdown-item"><input type="submit" class="btn btn-info" value="Simpan" style="width: 100%; !important"></a>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-power-off"></i>
            <span>Logout</span></a>
        </li>
      </ul>
      <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Overview</li>
            </ol>
            <div class="row">
              <div class="col-xl-auto" style="width: 50%;">
                <div class="card mb-3">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-sm-6 header_table">
                    <i class="fas fa-table"></i>
                    <label style="line-height: 2.0">Daftar Kehadiran</label>
                  </div>
                 <label class="col-sm-2 header_table" style="line-height: 2.0"> &nbsp; Status : </label>
                <form action="halaman_dashboard.php" method="GET" class="col-sm-4" style="margin-bottom: 1px;">
                  <select class="custom-select" id="stt"  name="stt" onchange="this.form.submit()">
                    <option selected="selected">Silahkan Pilih...</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Tidak hadir">Tidak hadir</option>
                    <option value="">Lihat Semua</option>
                  </select>
                </form>
                  </div>
                </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                        <thead>
                          <tr>
                            <th class="text-center" style="line-height: 2.8;" width="5px">No</th>
                            <th class="text-center" style="line-height: 2.8;">Nama Anggota </th>
                            <th class="text-center" width="40px">Status Kehadiran</th>
                            <th class="text-center" width="100px">Jumlah Lama Riset</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            //Make class include to this code
                            include_once "dashboard.php";
                              //call class dashboard and function
                              $dt = $_GET['stt'];
                              $datas = new Dashboard();
                              $data1 = $datas->Get_data_hadir();
                              $data2 = $datas->Get_data_tdkhadir();
                              $data3 = $datas->Get_data();
                               $i=0;
                            if ($dt == 'Hadir'){
                                while ($row = $data1->fetch_assoc()){
                                $jumlah_riset = $row[jumlah_riset];
                                $format4= date('H', strtotime($jumlah_riset));
                                $format5= date('i', strtotime($jumlah_riset));
                                $i++;
                                echo "
                                 <tr>
                                    <td class='text-center'>$i.</td>
                                    <td>$row[nama_anggota]</td>
                                    <td>$row[status_absensi]</td>
                                    <td class='text-right'>$format4 Jam $format5 Menit</td>
                                  </tr>";
                              }
                            } else if ($dt == 'Tidak hadir'){
                              while ($row = $data2->fetch_assoc()){
                                $jumlah_riset = $row[jumlah_riset];
                                $format4= date('H', strtotime($jumlah_riset));
                                $format5= date('i', strtotime($jumlah_riset));
                                $i++;
                                echo "
                                 <tr>
                                    <td class='text-center'>$i.</td>
                                    <td>$row[nama_anggota]</td>
                                    <td>$row[status_absensi]</td>
                                    <td class='text-right'>$format4 Jam $format5 Menit</td>
                                  </tr>";
                              }
                            } else {
                                  while ($row = $data3->fetch_assoc()){
                                    $jumlah_riset = $row[jumlah_riset];
                                    $format4= date('H', strtotime($jumlah_riset));
                                    $format5= date('i', strtotime($jumlah_riset));
                                    $i++;
                                    echo "
                             <tr>
                                <td class='text-center'>$i.</td>
                                <td>$row[nama_anggota]</td>
                                <td>$row[status_absensi]</td>
                                <td class='text-right'>$format4 Jam $format5 Menit</td>
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
              <div class="col-xl-auto" style="width: 50%;">
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fas fa-chart-pie"></i>
                    Grafik Kehadiran Anggota CodeLabs
                  </div>
                  <div id="piechart" style="width: 560px; height: 400;">
                  </div>
                  <div id="keterangan" class="card-body">
                    <?php
                      $data4 = $datas->Read();
                      $total = $data4->num_rows;
                      $data5 = $datas->Readhadir();
                      $hadir = $data5->num_rows;
                      $data6 = $datas->Readtdkhadir();
                      $tdkhadir = $data6->num_rows;

                        echo "Jumlah Semua Anggota = $total"."<br>";
                        echo "Jumlah Anggota Yang Hadir = $hadir"."<br>";
                        echo "Jumlah Anggota Yang Tidak Hadir = $tdkhadir"."<br>";
                          $data = $datas->Piechart();
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <?php include "footer.php";?>
        </div>
      </div>
    </body>
  </html>
  <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    <script type="text/javascript">
      // Call the dataTables jQuery plugin
        $(document).ready(function() {
          $('#dataTable').DataTable({
            "order" :  [[2, "asc"],]
          });
      });

      google.charts.load('current', {'packages':['corechart']});  
      google.charts.setOnLoadCallback(drawChart);  
      function drawChart()  
      {  
        var data = google.visualization.arrayToDataTable([
          ['status_absensi', 'Number'],
          <?php
            while ($row = $data->fetch_assoc()){
              echo "['".$row["status_absensi"]."', ".$row["number"]."],";
            }
          ?>
          ]);
        var options = {
          title: 'Percentage Kehadiran Anggota',
          // is3D:true,
          pieHole: 0.3
        };  
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);  
      }
    </script>