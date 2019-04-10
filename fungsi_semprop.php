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

		
		public function CariDataMahasiswaBerdasarkanNim($nim){
			//Dikerjakan oleh Aditya Angga Ramadhan
			
			
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, penguji.id_penguji as 		id_penguji FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on 					mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal and mahasiswa_metopen.	nim=$nim";

			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function LihatTanggalUjianSemprop(){
			//Dikerjakan oleh Satria Gradienta
			$query = "SELECT mahasiswa_metopen.nama, mahasiswa_metopen.topik, mahasiswa_metopen.dosen, seminar_proposal.tanggal FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim";
			
			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function LihatDataHasilInputanNilaiDanStatusSemprop(){
			//Dikerjakan oleh Iftitah Dwi Ulumiyah

			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,seminar_proposal.nilai, seminar_proposal.status,seminar_proposal.id_seminar  FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim";

			$this->execute($query);
			return $this->result;
			
			
			
		}

		public function DeleteDataSemprop($id_seminar,$nilai,$status,$nim){
			//Dikerjakan oleh Rafida Kumalasari
			$query = "DELETE FROM seminar_proposal VALUES ('$id_seminar','$nilai','$status','$nim')";
			mysqli_query($this->konek, $query);
			
			
		}

		public function InputNilaiDanStatusSemprop(){
			//Dikerjakan oleh Muhammad Adi Rezky

			$query = "INSERT INTO seminar_proposal VALUES ('$id_seminar','$nilai','$status','$nim')";
			mysqli_query($this->konek, $query);
			
		}
		
		public function UpdateNilaiDanStatusSemprop(){
			//Dikerjakan oleh Rizal Adijisman
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,seminar_proposal.nilai, seminar_proposal.status FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim"; //output
			$sql="UPDATE seminar_proposal SET id_seminar='$id_seminar', nilai='$nilai', status='$status', nim='$nim' WHERE nim='$nim'"; //edit
			$query="SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,seminar_proposal.nilai, seminar_proposal.status FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim and mahasiswa_metopen.nim=$nim"; //update
			
			
		}

		public function LihatPengumumanNilaiDanStatusSemuaMahasiswa(){
			//Dikerjakan oleh Siti Issari Sabhati
			
			$query = "SELECT mahasiswa_metopen.nama , mahasiswa_metopen.nim , seminar_proposal.nilai , seminar_proposal.status FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim = seminar_proposal.nim" ; 
			mysqli_query($this->konek, $query);

			
		}

		public function CariMahasiswaBerdasarkanNimPadaPengumumanHasilSemprop(){
			//Dikerjakan oleh Lalu Hendri Bagus Wira S
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs,seminar_proposal.nilai,seminar_proposal.status FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim  and mahasiswa_metopen.nim=$nim";

			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function UrutkanPengumumanSempropBerdasarkanNilai(){
			//Dikerjakan oleh Firman Cahyono

			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,seminar_proposal.nilai, seminar_proposal.status,seminar_proposal.id_seminar  FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim ORDER BY seminar_proposal.nilai ASC";

			$this->execute($query);
			return $this->result;
			 			
		}

		public function HitungJumlahMahasiswaLulusSemprop(){
			//Dikerjakan oleh Febri Ramadhan
		}

		public function HitungJumlahMahasiswaTidakLulusSemprop(){
			//Dikerjakan oleh Mohammad Ibrahim
		}





		

	}


 ?>