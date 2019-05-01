<?php date_default_timezone_set("Asia/Jakarta");?>
<html>
  <head>
      <?php
        // error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        session_start();
        $username=$_SESSION["username"];
        if($_SESSION["username"]==''){
          ?>
           <script>
           alert(' Anda Belum Login, Silahkan Login ! ');
           window.open('index.php','_self');
           </script>
          <?php
          }
        include "conection.php";
      ?>
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
      <a class="navbar-brand mr-1" href="absensi.php">Absensi</a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="POST" action="form_search.php">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search Nama..." name="cari" id="cari" required="required">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>      </form>
    </nav>
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav toggled">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="absensi.php">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Absensi</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-power-off"></i>
            <span>Logout</span></a>
        </li>
      </ul>
      <div id="content-wrapper">
        <?php include "search.php" ?>
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
    <script src="js/demo/datatables-demo.js"></script>