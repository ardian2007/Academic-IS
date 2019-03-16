<?php
	class Skripsi{
		
		private $user, $pass, $host, $db, $result, $conn;

		function __construct(){
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "";
			$this->db = "manajemen_skripsi_prpl";
		}
		public function connect(){
			$this->conn = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
		} 

		public function execute($query){
			$this->result = mysqli_query($this->conn, $query);
		}
		

		public function data_from_semprop() #DATA DARI TABEL SEMINAR PROPOSAL
		{
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.topik as topik, seminar_proposal.id_seminar as idseminar
			 ,case when month(curdate())BETWEEN '1' and '6' then 2*(year(curdate())-(SUBSTRING(mahasiswa_metopen.nim,1,2)+2000)) 
			else (2*(year(curdate()-1)-(SUBSTRING(mahasiswa_metopen.nim,1,2)+2000)))+1
			END AS semester
			 from mahasiswa_metopen join seminar_proposal on mahasiswa_metopen.nim = seminar_proposal.nim 
			 where seminar_proposal.status ='lulus'";
			$this->execute($query);
			return $this->result;
		}
		public function insert_skripsi($idskripsi,$judul,$status,$semester,$nim) 
		{
			$query = "INSERT INTO skripsi VALUES (
				'$idskripsi','$judul','$status','$semester','$nim')";
			$this->execute($query);
			return $this->result;
		}

		public function get_nilai_ujianSkripsi() #DATA DARI TABEL UJIAN PENDADARAN
		{
			$query = "SELECT ujian_pendadaran.nilai as nilai, skripsi.id_skripsi as idskripsi 
			from ujian_pendadaran RIGHT join skripsi on skripsi.id_skripsi = ujian_pendadaran.id_skripsi";
			$this->execute($query);
			return $this->result;
		}

		public function update_status_skripsi($status,$idskripsi) #UPDATE STATUS DARI TABEL SKRIPSI
		{
			$query = "UPDATE skripsi SET status_skripsi='$status' WHERE id_skripsi='$idskripsi'";
			$this->execute($query);
			return $this->result;
		}
	}
?>

