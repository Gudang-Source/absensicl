<html>
	<head>
        <title>Login</title>
        <link href="img/favicon.ico" rel="icon" type="image/x-icon"/>
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles-->
        <link href="css.css" rel="stylesheet">
	</head>
	<body class="bg-dark">
		<div class="container">
			<br>
			<br>
	      <div class="card card-login mx-auto mt-5">
	        <div class="card-header">Login</div>
	        <div class="card-body">
	          <form method="post" action="cek_login.php">
	            <div class="form-group">
	            	<div class="form-label-group">
	              	  <input type="text" id="username" name="username" class="form-control" required="required" autofocus="autofocus" maxlength="8">
	              	  <label for="inputNIM">Username</label>
	            	</div>
				</div>
	            <div class="form-group">
	            	<div class="form-label-group">
	                	<input type="password" id="password" name="password" class="form-control" required="required" maxlength="15">
	                	<label for="inputPassword">Password</label>
		            </div>
		        </div>
		        <input type="submit" class="btn btn-primary btn-block" value="Login">
	          </form>
	        </div>
	      </div>
	  </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
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
  </body>
</html>