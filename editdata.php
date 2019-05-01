<?php
include_once "dashboard.php";

//define class name and call parent class Dashboard (inheritance/child class)
class Edit_anggota extends Dashboard{

//define attribut for function Update()

  public $nimbaru;
  public $nama_anggota;
  public $bidang_riset;
  public $nim;
  
//function Update() for update data anggota

    public function Update(){ 
      $this->nim = $_POST['nim'];
      $this->nimbaru = $_POST['nimbaru'];
      $this->nama_anggota = $_POST['nama_anggota'];
      $this->bidang_riset = $_POST['bidang_riset'];
      $query = "UPDATE tb_anggota SET nim='$this->nimbaru', nama_anggota='$this->nama_anggota', bidang_riset='$this->bidang_riset' WHERE nim='$this->nim'";
      $results = mysqli_query($this->con, $query);
      return $results;
    }
  }
    //call class Edit_anggota and function Update()
    $datas = new Edit_anggota();
    $update = $datas->Update();
?>
<script type="text/javascript">
  alert("Data Berhasil Diupdate");
  document.location.href="halaman_anggota.php" 
</script>