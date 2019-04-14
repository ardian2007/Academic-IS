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
	public function getruang1(){
		$query="SELECT count(tempat)as jumlah1 from penjadwalan where tempat='1'";
		$this->eksekusi($query);
		return $this->result;
	}
	public function getruang2(){
		$query="SELECT count(tempat)as jumlah2 from penjadwalan where tempat='2'";
		$this->eksekusi($query);
		return $this->result;
	}
	public function getruang3(){
		$query="SELECT count(tempat)as jumlah3 from penjadwalan where tempat='3'";
		$this->eksekusi($query);
		return $this->result;
	}
	public function getsistemcerdas(){
		$query="SELECT count(bidang_minat)as jumlah_bidang_minat1 from mahasiswa_metopen where bidang_minat='sistemcerdas'";
		$this->eksekusi($query);
		return $this->result;
	}
	public function getrelata(){
		$query="SELECT count(bidang_minat)as jumlah_bidang_minat2 from mahasiswa_metopen where bidang_minat='relata'";
		$this->eksekusi($query);
		return $this->result;
	}
	public function lulus(){
		$query="SELECT COUNT(id_seminar) AS jml_lulus FROM seminar_proposal WHERE status='lulus' GROUP BY status";
		$this->eksekusi($query);
		return $this->result;
	}
	public function tidaklulus(){
		$query="SELECT COUNT(id_seminar) AS jml_tdk_lulus FROM seminar_proposal WHERE status='tidak_lulus' GROUP BY status";
		$this->eksekusi($query);
		return $this->result;
	}
	public function getall(){
		$query="SELECT * from penjadwalan";
		$this->eksekusi($query);
		return $this->result;
	}
}

 ?>