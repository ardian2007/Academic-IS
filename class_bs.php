<?php
	class Bimbingan_skripsi{
		
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
		






		
		public function show_data($jey) // menampilkan data skripsi mahasiswa, yang nanti ingin melakukan bimbingan
		{
			$query = "SELECT skripsi.id_skripsi as idsk, dosen.nama as namdos ,skripsi.judul_skripsi as judul , mahasiswa_metopen.nama as name , mahasiswa_metopen.nim as nim from dosen join mahasiswa_metopen on dosen.niy = mahasiswa_metopen.dosen join skripsi on mahasiswa_metopen.nim = skripsi.nim and mahasiswa_metopen.nim = $jey ";
			$this->execute($query);
			return $this->result;
		}

		public function masuk_ke_log($id,$materi,$id_skripsi,$tanggal,$jam) // input data ke tabel logbook_bimbingan 
		{
			$query = "INSERT INTO logbook_bimbingan values ('','$materi','$id_skripsi','$tanggal','$jam')";
			$this->execute($query);
			return $this->result;
		}

		public function select_one_mahasiswa($key)  // di gunakan ketika ingin melihat log bimbingan satu mahasiswa
		{
			$query = "SELECT *,mahasiswa_metopen.nama as namaa, mahasiswa_metopen.nim as Nm, dosen.nama as namdis from logbook_bimbingan join skripsi on logbook_bimbingan.id_skripsi = skripsi.id_skripsi join mahasiswa_metopen on mahasiswa_metopen.nim = skripsi.nim join dosen on dosen.niy = mahasiswa_metopen.Dosen and skripsi.nim = $key";
			$this->execute($query);
			return $this->result;
		}

	}
?>

