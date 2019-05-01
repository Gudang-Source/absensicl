<?php
include "dashboard.php";

//define class name and call parent class Dashboard (inheritance/child class)
class Tambah_anggota extends Dashboard{

	//define attribut for function tambah()
    public $nim;
    public $nama_anggota;
    public $bidang_riset;
    public $id_sidikjari;

    	//function tambah() for tambah data anggota
  		public function Tambah(){
			$this->nim 			= $_POST['nim'];
			$this->nama_anggota = $_POST['nama_anggota'];
			$this->bidang_riset = $_POST['bidang_riset'];
			$this->id_sidikjari = $_POST['id_sidikjari'];
			$query 				= "UPDATE tb_anggota SET nim='$this->nim', nama_anggota='$this->nama_anggota', bidang_riset='$this->bidang_riset', id_sidikjari='$this->id_sidikjari', status='true' WHERE nim ='$this->nim'";
			$results 			= mysqli_query($this->con, $query);
			return $results;
		}
	}

		//call class Tambah_anggota and function tambah()
	    $datas = new Tambah_anggota();
	    $tambah = $datas->Tambah();
?>

<script>
	alert("Data Berhasil Disimpan");
	document.location.href="halaman_anggota.php"
</script>