<?php 

	//class untuk data-data yang diperlukan pada fitur seminar proposal
	class Seminar_Proposal{

		//variaber yang diperlukan
		public $host, $user, $pass, $db, $hasil, $konek, $cari, $nilai, $status; 

		//konstruktor
		function __construct(){
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "";
			$this->db   = "manajemen_skripsi_prpl";
		}

		//fungsi untuk mengkoneksikan ke database
		public function koneksi(){
			$this->konek = mysqli_connect($this->host,$this->user,$this->pass,$this->db);

				//mengecek apakah database sudah terkoneksi
				if(!$this->konek){
					return die('Maaf koneksi belum tersambung'.mysqli_connect_error());
				}
		}

		//fungsi untuk mengeksekusi query
		public function eksekusi($query){
			$this->hasil = mysqli_query($this->konek, $query);
		}

		
		public function CariDataMahasiswaBerdasarkanNim(){
			//Dikerjakan oleh Aditya Angga Ramadhan
			
			
			
		}

		public function LihatTanggalUjianSemprop(){
			//Dikerjakan oleh Satria Gradienta
			
			
			
		}

		public function LihatDataHasilInputanNilaiDanStatusSemprop(){
			//Dikerjakan oleh Iftitah Dwi Ulumiyah
			
			
			
		}

		public function DeleteDataSemprop(){
			//Dikerjakan oleh Rafida Kumalasari
			
			
		}

		public function InputNilaiDanStatusSemprop(){
			//Dikerjakan oleh Muhammad Adi Rezky

			
			
		}
		
		public function UpdateNilaiDanStatusSemprop(){
			//Dikerjakan oleh Rizal Adijisman
			
			
			
		}

		public function LihatPengumumanNilaiDanStatusSemuaMahasiswa(){
			//Dikerjakan oleh Siti Ishari Sabhati
			
			
			
		}

		public function CariMahasiswaBerdasarkanNimPadaPengumumanHasilSemprop(){
			//Dikerjakan oleh Lalu Hendri Bagus Wira S
			
			
			
		}

		public function UrutkanPengumumanSempropBerdasarkanNilai(){
			//Dikerjakan oleh Firman Cahyono
			
			
			
		}



		

	}


 ?>