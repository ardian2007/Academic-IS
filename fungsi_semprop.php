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
		public function koneksi(){ //sudah
			$this->konek = mysqli_connect($this->host,$this->user,$this->pass,$this->db);

				//mengecek apakah database sudah terkoneksi
				if(!$this->konek){
					return die('Maaf koneksi belum tersambung'.mysqli_connect_error());
				}
		}

		//fungsi untuk mengeksekusi query
		public function eksekusi($query){ //sudah
			$this->hasil = mysqli_query($this->konek, $query);
		}

		
		public function CariDataMahasiswaBerdasarkanNim($nim){ //sudah
			//Dikerjakan oleh Aditya Angga Ramadhan
			
			
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, penguji.id_penguji as 		id_penguji FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on 					mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal and mahasiswa_metopen.	nim=$nim";

			$this->eksekusi($query);
			return $this->hasil;
			
			
		}


		public function lihatsempropmahasiswa(){  // sudah
			//Dikerjakan oleh muhammaad adi rezky
			
			
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, penguji.id_penguji as 		id_penguji, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on 					mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal join seminar_proposal on mahasiswa_metopen.nim=seminar_proposal.nim where seminar_proposal.nim='1700018086'";

			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function LihatTanggalUjianSemprop(){ //belum
			//Dikerjakan oleh Satria Gradienta
				$query = "SELECT mahasiswa_metopen.nama, mahasiswa_metopen.topik, mahasiswa_metopen.dosen, penjadwalan.tanggal FROM mahasiswa_metopen JOIN penjadwalan ON mahasiswa_metopen.nim=penjadwalan.nim WHERE penjadwalan.jenis_ujian = "SEMPROP";"
			
			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function LihatDataHasilInputanNilaiDanStatusSemprop($nim){ //sudah
			//Dikerjakan oleh Iftitah Dwi Ulumiyah
			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.status, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim and mahasiswa_metopen.nim=$nim";
			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function DeleteDataSemprop($nim){ //sudah
			//Dikerjakan oleh Rafida Kumalasari
			$query="DELETE FROM seminar_proposal WHERE nim=$nim";
			$this->eksekusi($query);
			return $this->hasil;
		}

		public function InputNilaiDanStatusSemprop($id_seminar,$nilai_proses_pembimbing,$status,$nim,$nilai_ujian_pembimbing,$nilai_ujian_penguji){ //sudah
			//Dikerjakan oleh Muhammad Adi Rezky

			$query = "INSERT INTO seminar_proposal VALUES ('$id_seminar','$nilai_proses_pembimbing','$status','$nim','$nilai_ujian_pembimbing', '$nilai_ujian_penguji')";
			$this->eksekusi($query);
			return $this->hasil;
			
		}
		


		public function UpdateNilaiDanStatusSemprop1($id_seminar,$nilai_proses_pembimbing,$status,$nim,$nilai_ujian_pembimbing,$nilai_ujian_penguji){ //sudah
			//Dikerjakan oleh Rizal Adijisman
			
			$query="UPDATE seminar_proposal SET id_seminar='$id_seminar', nilai_proses_pembimbing='$nilai_proses_pembimbing', status='$status', nim='$nim', nilai_ujian_pembimbing='$nilai_ujian_pembimbing', nilai_ujian_penguji='$nilai_ujian_penguji'"; //edit
			$this->eksekusi($query);
			return $this->hasil;
			
		}


		public function UpdateNilaiDanStatusSemprop2($nim){ //sudah??
			//Dikerjakan oleh Rizal Adijisman
			
			$query="SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim and mahasiswa_metopen.nim=$nim"; //update
			
			$this->eksekusi($query);
			return $this->hasil;
		}

		public function LihatPengumumanNilaiDanStatusSemuaMahasiswa(){ //sudah
			//Dikerjakan oleh Siti Ishari Sabhati

			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim"; //output
			
			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function CariMahasiswaBerdasarkanNimPadaPengumumanHasilSemprop($nim){ //sudah
			//Dikerjakan oleh Lalu Hendri Bagus Wira S
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim  and mahasiswa_metopen. nim=$nim";

			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function UrutkanPengumumanSempropBerdasarkanNilai(){ //salah
			//Dikerjakan oleh Firman Cahyono

			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,seminar_proposal.nilai, seminar_proposal.status FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim group by mahasiswa_metopen.nim ORDER BY seminar_proposal.nim ASC"; //output
			
			$this->eksekusi($query);
			return $this->hasil;
				
		}
		public function HitungJumlahMahasiswaLulusSemprop(){
			//Dikerjakan oleh Febri Ramadhan
		}

		public function HitungJumlahMahasiswaTidakLulusSemprop(){
			//Dikerjakan oleh Mohammad Ibrahim
		}

		



		

	}


 ?>