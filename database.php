<?php 
class Database
{
	private $host ,$user,$pass,$database,$conn,$result;
	function __construct(){
		$this->host="localhost";
		$this->user="root";
		$this->pass="";
		$this->database="manajemen_skripsi_prpl";
		// $this->database="metopen";

	}

	//dibuat oleh agung parmono
	public function connect(){
		$this->conn=mysqli_connect($this->host,$this->user,$this->pass);
		mysqli_select_db($this->conn,$this->database);
		if(!$this->conn){
			return die('Maaf, koneksi belum tersambung: '.mysqli_connect_error());
		}
	}

	//dibuat oleh agung parmono
	public function eksekusi($query){
		$this->result=mysqli_query($this->conn,$query);
	}

	//dibuat oleh agung parmono
	public function getDosen(){
		$query="SELECT * FROM dosen";
		$this->eksekusi($query);
		return $this->result;
	}

	//dibuat oleh ihsan fadhilah
	public function getMhs(){
		$query="SELECT mahasiswa_metopen.nama as nama,mahasiswa_metopen.nim as nim,mahasiswa_metopen.jenis_kelamin as jenis_kelamin,mahasiswa_metopen.topik as topik,dosen.nama as namados,mahasiswa_metopen.bidang_minat as bidang_minat, mahasiswa_metopen.tanggal_mulai as tanggal_mulai FROM mahasiswa_metopen JOIN dosen WHERE mahasiswa_metopen.dosen=dosen.niy";
		$this->eksekusi($query);
		return $this->result;
	}

	//dibuat oleh agung parmono
	public function register($nim,$nama,$jenis_kelamin,$topik,$dosen,$bidang_minat,$tanggal_mulai){
		$query = "INSERT INTO mahasiswa_metopen(nim,nama,jenis_kelamin,topik,dosen,bidang_minat,tanggal_mulai) VALUES ('$nim','$nama','$jenis_kelamin','$topik','$dosen','$bidang_minat','$tanggal_mulai')";
		$this->eksekusi($query);
		return $this->result;
	}

	//dibuat oleh ...
	public function getJumlahMhs(){
		$query="SELECT COUNT(nim) as jumlah_mahasiswa FROM mahasiswa_metopen";
		$this->eksekusi($query);
		return $this->result;
	}

	//dibuat oleh ...
	public function getJumlahDosen(){
		$query="SELECT COUNT(niy) as jumlah_dosen FROM dosen";
		$this->eksekusi($query);
		return $this->result;
	}

	public function FormUpdateDataMahasiswaMetopen($nim){
	//dibuat oleh randi indraguna
		$query = "SELECT nim, nama, topik, dosen FROM mahasiswa_metopen where nim='$nim'";
		$this->eksekusi($query);
		return $this->result;
		
	}
	

	public function UpdateDataMahasiswaMetopen($nim,$nama,$topik,$dosen){
	//dibuat oleh randi indraguna
		$query="UPDATE mahasiswa_metopen SET nim='$nim',nama='$nama',topik='$topik',dosen='$dosen' WHERE nim='$nim' ";
		$this->eksekusi($query);
		return $this->result;
	}


	public function getJumlahMahasiswaBimbingan(){
		//dibuat oleh ihsan fadhilah
		$query = "SELECT dosen.nama as nama, dosen.niy as niy, COUNT(nim) as jumlah_mahasiswa FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen = dosen.niy";
		$this->eksekusi($query);
		return $this->result;
	}

	public function CariDataMahasiswa($nim){
		//dibuat oleh Nur Fadhilah Alfianty F
		$query = "SELECT * FROM mahasiswa_metopen WHERE nim LIKE '%$nim'";
		$this->eksekusi($query);
		return $this->result;
	}

	public function DeleteMahasiswaMetopen($nim){
		$query="DELETE FROM mahasiswa_metopen WHERE nim='$nim'";
		$this->eksekusi($query);
		return $this->result;
	}

	public function getDataMahasiswaBimbinganDosenTertentu($niy){
		//Dikerjakan oleh amir fauzi ansharif
		$query="SELECT dosen.nama as nama_dosen, dosen.niy as niy, mahasiswa_metopen.nama as nama_mhs FROM dosen JOIN mahasiswa_metopen WHERE dosen.niy = '$niy'";
		$this->eksekusi($query);
		return $this->result;
	}
}

 ?>