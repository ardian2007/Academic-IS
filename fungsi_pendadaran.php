<?php
//JAWABAN UTS 

	//1. 1700018137
	//2. 
	//3.
	//4.

		//No 1. Penjelasan Class

			//Pada fitur ujian pendadaran hanya terdapat 1 class saja, yaitu class ujian_pendadaran.
			//class ujian_pendadaran yaitu sebuah blue print atau cetakan untuk membuat object-object yang dibutuhkan pada fitur ujian pendadaran
			//pada class ini terdapat beberapa atribut atau yaitu $host, $user, $pass, $db, $hasil, $konek, $cari, $nilai, $status 
			//terdapat 18 method/function yaitu : 
												//function __construct(), 
												//function koneksi(), 
												//function eksekusi(), 
												//function lihatstatusmahasiswapendadaran(),
												//function Lihatnilaipendadaran($nim), 
												//function Lihatnilaipendadaran1($nim)
												//function CariDataMahasiswaBerdasarkanNimpd($nim),  
												//function LihatTanggalUjianPendadaran(),
												//function LihatDataHasilInputanNilaiDanStatusPendadaran(),  
												//function DeleteDataPendadaran($nim),
												//function InputNilaiDanStatusPendadaran($nim,$id_pendadaran,$status,$nilai_penguji_1,$nilai_penguji_2,$nilai_pembimbing),
												//function UpdateNilaiDanStatusPendadaran1($nim,$status,$nilai_penguji_1,$nilai_penguji_2,$nilai_pembimbing), 
												//function UpdateNilaiDanStatusPendadaran2($nim)
												//function LihatPengumumanNilaiDanStatusSemuaMahasiswaPendadaran(), 
												//function CariMahasiswaBerdasarkanNimPadaPengumumanHasilPendadaran(),
												//function UrutkanPengumumanPendadaranBerdasarkanNilai(), 
												//function HitungJumlahMahasiswaLuluspendadaran(),
												//function HitungJumlahMahasiswaTidakLulusSemprop(), 
												
		
			
			//pada fitur ini terdapat function yang memiliki 3 level yaitu admin,mahasiswa, dan dosen pembimbing
			//pada level admin dapat mengelola dan menginput nilai, pada level mahasiswa hanya dapat melihat nilainya, pada level dosen  pembimbing hanya dapat melihat nilai mahasiswa yang dibimbing
 


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
		public function lihatstatusmahasiswapendadaran(){
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, ujian_pendadaran.status from mahasiswa_metopen join dosen on mahasiswa_metopen.dosen=dosen.niy join ujian_pendadaran on mahasiswa_metopen.nim=ujian_pendadaran.nim where dosen.niy='60160863'";

			$this->eksekusi($query);
			return $this->hasil;

		}

		public function lihatnilaipendadaran($nim){
			//dikerjakan muhammad adi rezky
			$query = " SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, penguji.id_penguji as id_penguji,penjadwalan.tanggal, ujian_pendadaran.nilai_penguji_1, ujian_pendadaran.nilai_penguji_2, ujian_pendadaran.nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal join ujian_pendadaran on mahasiswa_metopen.nim=ujian_pendadaran.nim where mahasiswa_metopen.nim=$nim";

			$this->eksekusi($query);
			return $this->hasil;

		}
		public function lihatnilaipendadaran1(){
			//dikerjakan muhammad adi rezky
			$query = " SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, penguji.id_penguji as id_penguji, dosen.nama  as nama_dsn, penjadwalan.tanggal, ujian_pendadaran.nilai_penguji_1, ujian_pendadaran.nilai_penguji_2, ujian_pendadaran.nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen join dosen on mahasiswa_metopen.dosen=dosen.niy join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal join ujian_pendadaran on mahasiswa_metopen.nim=ujian_pendadaran.nim where mahasiswa_metopen.nim='1700018086'";

			$this->eksekusi($query);
			return $this->hasil;

		}



		
		public function CariDataMahasiswaBerdasarkanNimpd($nim){
			//Dikerjakan oleh Aditya Angga Ramadhan
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, penguji.id_penguji as id_penguji, skripsi.judul_skripsi, penjadwalan.tanggal FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal join skripsi on mahasiswa_metopen.nim=skripsi.nim and mahasiswa_metopen.nim=$nim";

			$this->eksekusi($query);
			return $this->hasil;
			
		}

		public function LihatTanggalUjianPendadaran(){
			//Dikerjakan oleh Satria Gradienta
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama AS nama_mhs, mahasiswa_metopen.topik, dosen.nama AS nama_dsn, penguji.id_penguji AS penguji, penjadwalan.tanggal FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy JOIN penjadwalan ON mahasiswa_metopen.nim=penjadwalan.nim JOIN penguji ON penjadwalan.id_jadwal=penguji.id_jadwal";
			
			$this->eksekusi($query);
			return $this->hasil;
		
			
			
		}

		public function LihatDataHasilInputanNilaiDanStatusPendadaran(){
			//Dikerjakan oleh Iftitah Dwi Ulumiyah

			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs,ujian_pendadaran.nilai_penguji_1 as nilai_penguji_1, ujian_pendadaran.nilai_penguji_2 as nilai_penguji_2, ujian_pendadaran.nilai_pembimbing as nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen JOIN ujian_pendadaran ON mahasiswa_metopen.nim=ujian_pendadaran.nim";
			
			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function DeleteDataPendadaran($nim){
			//Dikerjakan oleh Rafida Kumalasari
			//Sudah dikerjakan oleh Rafida
			$query="DELETE FROM ujian_pendadaran WHERE nim='$nim'";	
			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function InputNilaiDanStatusPendadaran($nim,$id_pendadaran,$status,$nilai_penguji_1,$nilai_penguji_2,$nilai_pembimbing){
			//Dikerjakan oleh Muhammad Adi Rezky

			$query = "INSERT INTO ujian_pendadaran VALUES ('$nim','$id_pendadaran','$status','$nilai_penguji_1','$nilai_penguji_2','$nilai_pembimbing')";
			$this->eksekusi($query);
			return $this->hasil;
		}
		
		public function UpdateNilaiDanStatusPendadaran1($nim,$status,$nilai_penguji_1,$nilai_penguji_2,$nilai_pembimbing){
			//Dikerjakan oleh Rizal Adijisman
			$query="UPDATE ujian_pendadaran SET status='$status', nilai_penguji_1='$nilai_penguji_1', nilai_penguji_2='$nilai_penguji_2', nilai_pembimbing='$nilai_pembimbing' WHERE nim='$nim'"; //edit
			$this->eksekusi($query);
			return $this->hasil;			
		}

		public function UpdateNilaiDanStatusPendadaran2($nim){ //sudah??
			//Dikerjakan oleh Rizal Adijisman
			
			$query="SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,ujian_pendadaran.nilai_penguji_1,ujian_pendadaran.nilai_penguji_2, ujian_pendadaran.nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen JOIN ujian_pendadaran ON mahasiswa_metopen.nim=ujian_pendadaran.nim and mahasiswa_metopen.nim=$nim"; //update
			
			$this->eksekusi($query);
			return $this->hasil;
		}

		public function LihatPengumumanNilaiDanStatusSemuaMahasiswaPendadaran(){
			//Dikerjakan oleh Siti Issari Sabhati (1700018137)
			//UTS NO 2
			//fungsi ini bernama LihatPengumumanNilaiDanStatusSemuaMahasiswaPendadaran()
			//fungsi ini digunakan untuk menampilkan pengumuman nilai dan status semua mahasiswa yang telah pendadaran

			$query = "SELECT mahasiswa_metopen.nim as nim , mahasiswa_metopen.nama as nama_mhs,  penjadwalan.tanggal,  ujian_pendadaran.nilai_penguji_1 as nilai_penguji_1, ujian_pendadaran.nilai_penguji_2 as nilai_penguji_2, ujian_pendadaran.nilai_pembimbing as nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen JOIN ujian_pendadaran ON mahasiswa_metopen.nim=ujian_pendadaran.nim join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim";

			//Menampilkan Nim dari tabel mahasiswa_metopen , nama dari tabel mahasiswa_metopen , tanggal dari tabel penjadwalan , nilai_penguji1 (nilai yang diberikan oleh dosen penguji 1) dari tabel ujian pendadaran , nilai_penguji2 (nilai yang diberikan oleh dosen penguji 2) dari tabel ujian pendadaran , nilai_pembimbing (nilai yang diberikan oleh dosen pembimbing) dari tabel ujian_pendadaran ,  status (status apakah mahasiwa tersebut lulus atau tidak) dari tabel ujian_pendadaran Dengan mengambil data dari tabel mahasiswa_metopen digabungkan (join) dengan tabel ujian_pendadaran dengan mencocokkan (on) nim dari tabel mahasiswa_metopen dengan nim dari tabel ujian pendadaran lalu menggabungkannya (join) lagi dengan tabel penjadwalan dengan mencocokkan (ON) nim dari tabel mahasiswa_metopen dengan nim dari tabel penjadwalan.



			$this->eksekusi($query);
			return $this->hasil;
			

			
		}

		public function CariMahasiswaBerdasarkanNimPadaPengumumanHasilPendadaran(){
			//Dikerjakan oleh Lalu Hendri Bagus Wira S
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, penjadwalan.tanggal, skripsi.judul_skripsi, ujian_pendadaran.nilai_penguji_1,ujian_pendadaran.tanggal_ujian,ujian_pendadaran.id_skripsi,ujian_pendadaran.nilai_penguji_2,ujian_pendadaran.nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen JOIN skripsi ON mahasiswa_metopen.nim=skripsi.nim join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join ujian_pendadaran on mahasiswa_metopen.nim=ujian_pendadaran.nim AND mahasiswa_metopen.nim=$nim";

			$this->eksekusi($query);
			return $this->hasil;
			
		}

		public function UrutkanPengumumanPendadaranBerdasarkanNilai(){
			//Dikerjakan oleh Firman Cahyono

			
		}

		public function HitungJumlahMahasiswaLuluspendadaran(){
			//Dikerjakan oleh Febri Ramadhan

			$query = "SELECT COUNT(ujian_pendadaran.status ) as lulus FROM ujian_pendadaran WHERE status='lulus'";
			
			$this->eksekusi($query);
			return $this->hasil;

			
		}

		public function HitungJumlahMahasiswaTidakLuluspendadaran(){
			//Dikerjakan oleh Mohammad Ibrahim


			$query = "SELECT COUNT(ujian_pendadaran.status ) as tidak_lulus FROM ujian_pendadaran WHERE status='tidak_lulus'";
			
			$this->eksekusi($query);
			return $this->hasil;

		}



		

	}


 ?>