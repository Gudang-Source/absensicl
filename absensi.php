<?php
//define class name (Parent class)
class Absensi{
	
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

	//define attribut for function get_data()
	public $startfilter;
	public $endfilter;

        //function get_data()
		public function Get_data(){
            $this->startfilter	= $_GET['startfilter'];
            $this->endfilter	= $_GET['endfilter'];

            //set condition without filter data
            if ($this->startfilter!='') {
            	//query when use filter data
				$query 		="SELECT absensi.idabsensi, tb_anggota.nim, tb_anggota.nama_anggota,tgl_absensi, waktu_riset waktu_datang, waktu_pulang, lama_riset,IF (waktu_pulang='00:00:00',(timediff (waktu_pulang,waktu_riset)),(timediff (timediff(waktu_pulang,waktu_datang),waktu_riset))) AS kurang_riset,tb_anggota.id_sidikjari FROM absensi join tb_anggota on tb_anggota.id_sidikjari = absensi.id_sidikjari where tgl_absensi BETWEEN '$this->startfilter' AND '$this->endfilter' ORDER by tgl_absensi desc,waktu_datang asc";
				} else {
				//query when didnt use filter data
				$query 		="SELECT tb_anggota.nim, tb_anggota.nama_anggota,tgl_absensi, waktu_riset, waktu_datang, waktu_pulang, lama_riset, IF (waktu_pulang='00:00:00',(timediff(waktu_pulang,waktu_riset)),(timediff (timediff(waktu_pulang,waktu_datang),waktu_riset))) AS kurang_riset , tb_anggota.id_sidikjari FROM absensi join tb_anggota on tb_anggota.id_sidikjari = absensi.id_sidikjari ORDER by tgl_absensi desc,waktu_datang asc ";
			}
			$results 		=mysqli_query($this->con, $query);
			return $results;
		}

		//define attribut for function setwaktu_riset()
		public $waktu_riset;

 		//function setwaktu_riset()
		public function setwaktu_riset(){
			$this->waktu_riset	= $_GET['wakturiset'];
			$query = "INSERT INTO tb_riset (waktu_riset) VALUES ('$this->waktu_riset')";
            $results = mysqli_query($this->con, $query);
            return $results;
		}

 		//function getwaktu_riset()
		public function getwaktu_riset(){
			$query = "SELECT tb_riset.waktu_riset FROM tb_riset ORDER by id_riset DESC LIMIT 1";
            $results = mysqli_query($this->con, $query);
            return $results;
		}
	}
?>