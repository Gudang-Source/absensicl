<?php 
//call session for this interface
include_once "session/Session.php";
?>
<html>
  <head>
    <title>Absensi </title>
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
      <a class="navbar-brand mr-1" href="halaman_absensi.php">Absensi</a>
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
        <li class="nav-item active">
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
          </a>
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
<!--                 <input type="time" name="wakturiset" id="wakturiset" class="form-control"></a> -->
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
        <?php include "daftar_absensi.php" ?>
      </div>
    </div>
  </body>
  </html> 
 <!--    <script type="text/javascript">
      $(document).ready(function() {
        setInterval(function() {
          getAbsensi();
        }, 5000);
      });

      function getAbsensi() {
        $.ajax({
          url: 'daftar_absensi.php',
          type: 'GET',
          success: function(data) {
            $('#content-wrapper').html(data);
          },
          error: function(e) {
            console.log(e);
          }
        });
      };
    </script> -->