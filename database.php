<?php 
class Database
{
	private $host ,$user,$pass,$database,$conn,$result;
	function __construct(){
		$this->host="localhost";
		$this->user="root";
		$this->pass="";
		$this->database="manajemen_skripsi_prpl";
	}

	public function connect(){
		$this->conn=mysqli_connect($this->host,$this->user,$this->pass);
		mysqli_select_db($this->conn,$this->database);
		if(!$this->conn){
			return die('Maaf, koneksi belum tersambung: '.mysqli_connect_error());
		}
	}

	public function eksekusi($query){
		$this->result=mysqli_query($this->conn,$query);
	}

	public function getDosen(){
		$query="SELECT * FROM dosen ORDER BY niy ASC";
		$this->eksekusi($query);
		return $this->result;
	}

	public function getMhs(){
		$query="SELECT * FROM mahasiswa_metopen";
		$d=$this->eksekusi($query);
		return $this->result;
	}

	public function register($nim,$nama,$topik,$dosen){
		$query = "INSERT INTO mahasiswa_metopen(nim,nama,topik,dosen) VALUES ('$nim','$nama','$topik','$dosen')";
		$this->eksekusi($query);
		return $this->result;
	}

	public function UpdateDataMahasiswaMetopen(){
		//Dikerjakan oleh randi indraguna
		$query="SELECT nim, nama, topik, dosen, bidang_minat, tanggal_mulai FROM mahasiswa_metopen where nim='$nim'";
		$sql="UPDATE mahasiswa_metopen SET nim='$nim',nama='$nama',topik='$topik',dosen='$dosen',bidang_minat='$bidang_minat',tanggal_mulai='$tanggal_mulai' WHERE nim='$nim'";
	}
	
}

 ?>