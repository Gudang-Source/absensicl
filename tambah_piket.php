<?php
include "dashboard.php";

//define class name and call parent class Dashboard (inheritance/child class)
class Tambah_piket extends Dashboard{

	//define attribut for function tambah()
    public $nim;
    public $nama_anggota;
    public $tanggal;
    public $jenispiket;

    	//function tambah() for tambah data anggota
  		public function Tambah(){
			$this->nim 			= $_POST['nim'];
			$this->nama_anggota = $_POST['nama_anggota'];
			$this->tanggal = $_POST['tanggal_piket'];
			$this->jenispiket = $_POST['jenis_piket'];
			// $query 				= "UPDATE tb_anggota SET nim='$this->nim', nama_anggota='$this->nama_anggota', bidang_riset='$this->bidang_riset', id_sidikjari='$this->id_sidikjari', status='true' WHERE nim ='$this->nim'";
			// $results 			= mysqli_query($this->con, $query);
			// return $results;
		}
	}

		//call class Tambah_piket and function tambah()
	    $datas = new Tambah_piket();
	    $tambah = $datas->Tambah();
?>

<script>
	alert("Data Berhasil Disimpan");
	document.location.href="halaman_piket.php"
</script>