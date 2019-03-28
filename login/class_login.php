<?php 
	
	class Login
	{
		
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


		public function searchAkun($username,$password){
			$query = "SELECT * from akun where username='$username' and password='$password'";
			$this->execute($query);
			return $this->result;
		}
		public function searchAkunDosen($username){
			$query = "SELECT niy from dosen where niy='$username'";
			$this->execute($query);
			return $this->result;
		}
		public function searchAkunMahasiswa($username){
			$query = "SELECT nim from mahasiswa_metopen where nim='$username'";
			$this->execute($query);
			return $this->result;
		}
		
		public function getLevelAkun($username){
			$query = "SELECT level from akun where username='$username'";
			$this->execute($query);
			return $this->result;
		}

	}


?>