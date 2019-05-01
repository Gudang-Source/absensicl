<?php
class Databases{  
	public $con;
	public $db_host = "localhost";
	public $db_user = "root";
	public $db_pass = "";
	public $db_name = "presens2_kehadiran";
		public function __construct() {  
		   $this->con = mysqli_connect($this->db_host,$this->db_user,$this->db_pass, $this->db_name);
		   return true; 
		}
	}
?>
