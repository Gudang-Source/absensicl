<html>
  <?php
   include_once "session/Session.php";
  ?>
<head>
	<title>Tambah Anggota CodeLabs</title>
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
	  <a class="navbar-brand mr-1" href="halaman_daftar_anggota.php">Daftar Anggota</a>
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
	            <form>
	              <a class="dropdown-item"><input type="time" name="wakturiset" id="wakturiset" class="form-control"></a>
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
	             		<a href="#">Daftar Anggota CodeLabs</a>
	           		</li>
	            	<li class="breadcrumb-item active">Tambah Data Anggota</li>
	          	</ol>
	          	<form method="post" action="tambah_anggota.php">
	          		<div class="card-header border rounded">
	            <table class="card-body" id="dataTable" width="100%" cellspacing="0">
		  		    <tr>
			            <td width="300px"><label class="data bg-white">NIM</label></td>
			            <td class="td">:</td>
			            <td width="70%"><label class="edit"><input type="text" name="nim" class="form-control" maxlength='8' required="required" readonly="readonly" style="background-color: white;"></label></td>
		  		    </tr>
		  		    <tr>
			            <td><label class="data bg-white">Nama</label></td>
			            <td class="td">:</td>
			            <td><label class="edit"><input type="text" name="nama_anggota" class="form-control" maxlength='40' required="required"></label></td>
		  		    </tr>
		  		    <tr>
			            <td><label class="data bg-white">Bidang Riset</label></td>
			            <td class="td">:</td>
			            <td><label class="edit"><input type="text" name="bidang_riset" class="form-control" maxlength='50' required="required"></label></td>
		  		    </tr>
		  		    <tr>
			            <td><label class="data bg-white">ID Sidik Jari</label></td>
			            <td class="td">:</td>
			            <td><label class="edit"><input type="text" name="id_sidikjari" class="form-control" maxlength='50' required="required" readonly="readonly" style="background-color: white;"></label></td>
		  		    </tr>
		        </table>
		    </div>
		    <br>
			<input type="submit" class="btn btn-primary w-25" value="Simpan">
			<input type="Reset" class="btn btn-primary w-25" value="Reset">
			</form>
                <?php include "footer.php";?>
	    </div>
	</div>
</div>
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
<script type="text/javascript">
	$(document).ready(function() {
        setInterval(function() {
          $.ajax({
	          url: 'cek_session_register.php',
	          type: 'GET',
	          success: function(data) {
	          	data = JSON.parse(data);
	            if(data.status == true) {
	            	$('input[name="nim"]').val(data.nim);
	            	$('input[name="id_sidikjari"]').val(data.id);
	            }
	          },
	          error: function(e) {
	            console.log(e);
	          }
	        });
        }, 1000);
    });
</script>
</body>
</html>