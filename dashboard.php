<?php
//define class name (Parent class)
class Dashboard{
	
	//define attribut connection to databases
	public $con;
	public $db_host = "localhost";
	public $db_user = "root";
	public $db_pass = "";
	public $db_name = "presens2_kehadiran";
		//function magic __construct connect to databases
		public function __construct() {  
		   $this->con = mysqli_connect($this->db_host,$this->db_user,$this->db_pass, $this->db_name);
		   return true; 
		}

		//define all attribut for halaman dashboard
		public $id;
		public $nim;
		public $nama_anggota;
		public $bidang_riset;
		public $id_sidikjari;

		//function Delete() for delete data anggota form table tb_anggota
		public function Delete(){
			$this->nim 	= $_GET['nim'];
			$this->id 	= $_GET['id_sidikjari'];
			$query 		= "delete from tb_anggota where nim='$this->nim' or id_sidikjari='$this->id'";
			$results 	= mysqli_query($this->con, $query);
			return $results;
		}

		//function Get_nim() for select data from table tb_anggota
	    public function Getnim(){
			$this->nim 	= $_GET['nim'];
			$query1		="Select * From tb_anggota where nim='$this->nim'";
			$results 	= mysqli_query($this->con, $query1);
			return $results;
		}

		//function Readhadir() for select data from table tb_anggota
		public function Readhadir(){
			$query 		= "SELECT * FROM tb_anggota where status_absensi ='Hadir' order by status_absensi asc, nama_anggota asc";
			$results 	= mysqli_query($this->con, $query);
			return $results;
		}

		//function Readtdkhadir() for select data from table tb_anggota
		public function Readtdkhadir(){
			$query 		= "SELECT * FROM tb_anggota where status_absensi ='Tidak hadir' order by status_absensi asc, nama_anggota asc";
			$results 	= mysqli_query($this->con, $query);
			return $results;
		}
		
		//function read() for select all data anggota form table tb_anggota
		public function Read(){
			$query 		= "SELECT * FROM tb_anggota order by status_absensi asc, nama_anggota asc";
			$results 	= mysqli_query($this->con, $query);
			return $results;
		}

        //function get_data_hadir()
		public function Get_data_hadir(){
            $query 	= "SELECT * from tb_anggota JOIN (SELECT DISTINCT a.nim, SEC_TO_TIME(SUM(TIME_TO_SEC(a.lama_riset))) as jumlah_riset FROM absensi a GROUP BY a.nim) x WHERE x.nim = tb_anggota.nim AND tb_anggota.status_absensi='Hadir' order by nama_anggota asc";
			$results= mysqli_query($this->con, $query);
			return $results;
		}

		//function get_data_tidak_hadir()
		public function Get_data_tdkhadir(){
			$query	= "SELECT * from tb_anggota JOIN (SELECT DISTINCT a.nim, SEC_TO_TIME(SUM(TIME_TO_SEC(a.lama_riset))) as jumlah_riset FROM absensi a GROUP BY a.nim) x WHERE x.nim = tb_anggota.nim AND tb_anggota.status_absensi='Tidak hadir' order by nama_anggota asc";
			$results= mysqli_query($this->con, $query);
			return $results;
		}

		//function get_data()
		public function Get_data(){
			$query	= "SELECT * FROM tb_anggota JOIN (SELECT DISTINCT a.nim, SEC_TO_TIME(SUM(TIME_TO_SEC(a.lama_riset))) as jumlah_riset  FROM absensi a GROUP BY a.nim) x WHERE x.nim = tb_anggota.nim order by status_absensi asc, nama_anggota asc";
			$results= mysqli_query($this->con, $query);
			return $results;
		}

        //function get value piechart()
		public function Piechart(){
			$query = "SELECT status_absensi, count(*) as number FROM tb_anggota GROUP BY status_absensi";
			$results = mysqli_query($this->con, $query);
		return $results;
		}
	}
?>