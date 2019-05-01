<?php
session_start();
//define class
class Login{

	//define attribut connection	
	public $con;
	public $db_host = "localhost";
	public $db_user = "root";
	public $db_pass = "";
	public $db_name = "presens2_kehadiran";

		//function magic __construct connect to database
		public function __construct() {  
		   $this->con = mysqli_connect($this->db_host,$this->db_user,$this->db_pass, $this->db_name);
		   return true; 
		}

	//define atrribut Login
	public $username;
	public $password;

		//function validasi Login
		public function Validasi(){  
			$this->username= $_POST['username'];
			$this->password= $_POST['password'];
			$query = "SELECT * FROM tb_admin WHERE username='$this->username' and password='$this->password'";
            $results = mysqli_query($this->con, $query);
            return $results;
		}
	}

	//call class login
	$datas = new Login();
	$data = $datas->Validasi();

	//Kondisi untuk login ke halaman website
		if($data->num_rows>0) {
			while ($row = $data->fetch_assoc()){
			$_SESSION['username']=$row['username'];
			}?>
			<script type="text/javascript">
				alert("Anda Berhasil login !"); 
				window.open('halaman_dashboard.php','_self');
			</script>
		<?php
		} else {?>
			<script type="text/javascript">
				alert('Username atau Passsword yang ada masukkan salah!!');
				window.open('index.php','_self');
			</script>
		<?php
		}
?>