<?php 

	//class untuk data-data yang diperlukan pada fitur ujian pendadaran
	class ujian_pendadaran{

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

		public function LihatTanggalUjianPendadaran(){
			//Dikerjakan oleh Satria Gradienta
		
			
			
		}

		public function LihatDataHasilInputanNilaiDanStatusPendadaran(){
			//Dikerjakan oleh Iftitah Dwi Ulumiyah

			
			
			
		}

		public function DeleteDataPendadaran(){
			//Dikerjakan oleh Rafida Kumalasari
			
			
		}

		public function InputNilaiDanStatusPendadaran(){
			//Dikerjakan oleh Muhammad Adi Rezky

			
		}
		
		public function UpdateNilaiDanStatusPendadaran(){
			//Dikerjakan oleh Rizal Adijisman
			
			
			
		}

		public function LihatPengumumanNilaiDanStatusSemuaMahasiswaPendadaran(){
			//Dikerjakan oleh Siti Issari Sabhati
		

			
		}

		public function CariMahasiswaBerdasarkanNimPadaPengumumanHasilPendadaran(){
			//Dikerjakan oleh Lalu Hendri Bagus Wira S
			
			
		}

		public function UrutkanPengumumanPendadaranBerdasarkanNilai(){
			//Dikerjakan oleh Firman Cahyono

			
		}

		public function HitungJumlahMahasiswaLulusPendadaran(){
			//Dikerjakan oleh Febri Ramadhan
		}

		public function HitungJumlahMahasiswaTidakLulusPendadaran(){
			//Dikerjakan oleh Mohammad Ibrahim
		}



		

	}


 ?>