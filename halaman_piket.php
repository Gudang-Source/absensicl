<?php 
//call session for this interface
include_once "session/Session.php";
?>
<html>
  <head>
    <title>Daftar Jadwal Piket</title>
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
      <a class="navbar-brand mr-1" href="halaman_daftar_anggota.php">Daftar Jadwal Piket</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
    </nav>
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav toggled">
        <li class="nav-item">
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
        <li class="nav-item active">
              <a class="nav-link" href="halaman_piket.php">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Piket</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa fa-cog"></i>
            <span>Setting</span></a>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-item">Waktu Riset</h6>
            <form action="waktu_riset.php" method="get">
              <a class="dropdown-item">
                <select class="form-control" name="wakturiset" id="wakturiset">
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
                <a href="#">Daftar Jadwal Piket</a>
              </li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          <form action="form_tambah_piket.php">
            <div class="bg-white">
              <div class="small text-muted text-left">
                <div class="row">
                  <div class="col-sm-auto">
                  <a class="texttambah fadeIn animated" value="Tambah Piket"><button class="btn btn-info"> Tambah Jadwal Piket</button></a>
                  </div>
                </div>
              </div>
            </div>
          </form>
            <div class="card mb-3">
              <div class="card-header">
                <!-- <div class="row"> -->
                  <i class="fas fa-table"></i>
                  Daftar Jadwal Piket
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                        <thead>
                          <tr>
                            <th class="text-center" width="10px">No</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">Nama Anggota </th>
                            <th class="text-center">Tanggal Piket</th>
                            <th class="text-center">Jenis Piket</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                          <!-- <tbody>
                          <?php
                          //Make class include to this code
                          include "dashboard.php";
                                  $dt = $_POST['inputGroupSelect01'];
                                  $datas = new Dashboard();
                                    $data = $datas->Read();
                                    $total = $data->num_rows;
                                    $i=0;
                                    while ($row = $data->fetch_assoc()){
                                      $i++;
                                      echo "
                                   <tr>
                                          <td class='text-center'>$i.</td>
                                          <td>$row[nim]</td>
                                          <td>$row[nama_anggota]</td>
                                          <td>$row[bidang_riset]</td>
                                          <td class='text-center'>$row[id_sidikjari]</td>
                                          <td>$row[status_absensi]</td>
                                          <td class='text-center'><a href='form_edit_anggota.php?nim=$row[nim]'><img src='img/edit.png' class='icon text-right'></a>
                                          <a href='hapus_anggota.php?nim=$row[nim]'><img src='img/hapus.png' class='icon text-right'></a></td>
                                        </tr>";
                                  }
                                ?> 
                        </tbody> -->
                      </table>
                    </div>
                  </div>
                </div>
                <?php include "footer.php";?>
            </div>
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
    <!-- Demo scripts for this page-->
        <script type="text/javascript">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
          $('#dataTable').DataTable({
            "order" :  [[5, "asc"]]
        	}); 
        });
    </script>