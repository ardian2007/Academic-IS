<?php 


	//JAWABAN UTS 

	//1. 1700018131
	//2. 1700018146
	//3. 1700018125
	//4.

		//No 1. Penjelasan Class

			//Pada fitur seminar prosal hanya terdapat 1 class saja, yaitu class Seminar_Proposal.
			//class Seminar_Proposal yaitu sebuah blue print atau cetakan untuk membuat object-object yang dibutuhkan pada fitur seminar proposal
			//pada class ini terdapat beberapa atribut atau yaitu $host, $user, $pass, $db, $hasil, $konek, $cari, $nilai, $status 
			//terdapat 19 method/function yaitu : 
												//function __construct(), function koneksi(), function eksekusi(), function lihatstatusmahasiswapembimbing(),
												//function CariDataMahasiswaBerdasarkanNim($nim), function lihatsempropmahasiswa()
												//function lihatsempropmahasiswa1($nim),  function LihatDataHasilInputanNilaiDanStatusSemprop($nim),
												//function DeleteDataSemprop($nim),  function InputNilaiDanStatusSemprop($id_seminar,$nilai_proses_pembimbing,$status,$nim,$nilai_ujian_pembimbing,$nilai_ujian_penguji),
												//function UpdateNilaiDanStatusSemprop1($nilai_proses_pembimbing,$status,$nim,$nilai_ujian_pembimbing,$nilai_ujian_penguji),
												//function UpdateNilaiDanStatusSemprop2($nim), function LihatPengumumanNilaiDanStatusSemuaMahasiswa()
												//function LihatPengumumanNilaiDanStatusSemuaMahasiswa(), function CariMahasiswaBerdasarkanNimPadaPengumumanHasilSemprop($nim)
												//function UrutkanPengumumanSempropBerdasarkanNilai(), function HitungJumlahMahasiswaLulusSemprop()
												//HitungJumlahMahasiswaTidakLulusSemprop(), function cetak($nim)
		
			
			//pada fitur ini terdapat function yang memiliki 3 level yaitu admin,mahasiswa, dan dosen pembimbing
			//pada level admin dapat mengelola dan menginput nilai, pada level mahasiswa hanya dapat melihat nilainya, pada level dosen  pembimbing hanya dapat melihat nilai mahasiswa yang dibimbing
			
		
			



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

		public function lihatstatusmahasiswapembimbing(){
			//dibuat oleh muhammad adi rezky
			$query = "SELECT  mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, seminar_proposal.status from mahasiswa_metopen join dosen on mahasiswa_metopen.dosen=dosen.niy join seminar_proposal on mahasiswa_metopen.nim=seminar_proposal.nim where dosen.niy='60160863'";

			$this->eksekusi($query);
			return $this->hasil;
		}

		
		public function CariDataMahasiswaBerdasarkanNim($nim){ //sudah
			//Dikerjakan oleh Aditya Angga Ramadhan (1700018131)

			//UTS No 2. Penjelasan Function

				// fungsi ini bernama CariMahasiswaBerdasarkanNim , digunakan untuk searching atau pencarian data mahasiswa pada level admin yang akan menginputkan nilai seminar proposal, yang meliputi data : nim, nama mahasiswa, nama dosen pembimbing, id dosen penguji.
				// fungsi ini menjoinkan 4 tabel yaitu tabel mahasiswa_metopen, dosen, penjadwalan dan penguji dengan primary key tabel mahasiswa metopen yaitu nim, tabel dosen yaitu niy, tabel penjadwalan yaitu id_jadwal,tabel penguji yaitu id_penguji

				// tabel mahasiswa_metopen yang terfapat FK dosen join dengan tabel dosen pada PK niy, kemudian mahasiswa_metopen pada PK nim join dengan penjadwalan pada FK nim , kemudian tabel penjadwalan pada PK id jadwal join dengan tabel penguji pada FK id_jadwal, dan $nim sebagai parameter untuk mengirim mahasiswa_metopen.nim pada variabel $nim di function  CariDataMahasiswaBerdasarkanNim($nim) 

			
			
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, penguji.id_penguji as id_penguji FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal and mahasiswa_metopen.nim=$nim";

			$this->eksekusi($query);
			return $this->hasil;
			
			
		}


		public function lihatsempropmahasiswa(){  // sudah
			//Dikerjakan oleh muhammaad adi rezky
			
			
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, penguji.id_penguji as 		id_penguji, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on 					mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal join seminar_proposal on mahasiswa_metopen.nim=seminar_proposal.nim where seminar_proposal.nim='1700018086'";

			$this->eksekusi($query);
			return $this->hasil;
			
			
		}
		public function lihatsempropmahasiswa1($nim){  // sudah
			//Dikerjakan oleh muhammaad adi rezky
			
			
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, penguji.id_penguji as id_penguji,penjadwalan.tanggal, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status FROM mahasiswa_metopen join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal join seminar_proposal on mahasiswa_metopen.nim=seminar_proposal.nim where mahasiswa_metopen.nim='$nim'";

			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function LihatTanggalUjianSemprop(){ //sudah
			//Dikerjakan oleh Satria Gradienta (1700018125)
				//Jawaban nomer 2 . Penjelasan Function

				//Fungsi untuk melihat Tanggal Ujian Seminar Proposal
				//Fungsi ini akan menampilkan Nim, Nama mahasiswa, Nama dosen, Penguji, Dan Tanggal
				//Dari tabel mahasiswa metopen dijoinkan pada tabel dosen disatukan premery key di dosen, kemudian dijoinkan dengan tabel penjadwalan disatukan premery key di nim, kemudian dijoinkan dengan Penguji di satukan premery key di id_penjadwalan
				//Untuk mengeksekusi query dengan menggunakan $this->eksekusi($query);
				//Untuk pengembalian fungsi query dengan menggunakan return $this->hasil;

				$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama AS nama_mhs, dosen.nama AS nama_dsn, penguji.id_penguji AS penguji, penjadwalan.tanggal FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy JOIN penjadwalan ON mahasiswa_metopen.nim=penjadwalan.nim JOIN penguji ON penjadwalan.id_jadwal=penguji.id_jadwal";
			
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

		


		public function UpdateNilaiDanStatusSemprop1($nilai_proses_pembimbing,$status,$nim,$nilai_ujian_pembimbing,$nilai_ujian_penguji){ //sudah
			//Dikerjakan oleh Rizal Adijisman
			
			$query="UPDATE seminar_proposal SET nilai_proses_pembimbing='$nilai_proses_pembimbing', status='$status', nim='$nim', nilai_ujian_pembimbing='$nilai_ujian_pembimbing', nilai_ujian_penguji='$nilai_ujian_penguji' where nim='$nim'"; //edit
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

			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status, penjadwalan.tanggal FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim join penjadwalan ON mahasiswa_metopen.nim=penjadwalan.nim JOIN penguji ON penjadwalan.id_jadwal=penguji.id_jadwal"; //output
			
			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function CariMahasiswaBerdasarkanNimPadaPengumumanHasilSemprop($nim){ //sudah
			//Dikerjakan oleh Lalu Hendri Bagus Wira S (1700018146)
			//fungsi ini bernama CariMahasiswaBerdasarkanNimPadaPengumumanHasilSemprop
			//fungsi ini  untuk mencari data hasil seminar proposal mahasiswa berdasarkan nim dengan menginputkan nim sebagai keynya
			//nanti outputnya itu menampilkan NIM,Nama Mahasiswa,Tanggal Ujian,nilai proses pembimbing,nilai ujian pembimbing,nilai ujian penguji,status, dan action(update dan delet)
			//di fungsi ini kita menjoinkan tiga tabel yaitu tabel mahasiswa_metopen,seminar_proposal dan penjadwalan
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji, seminar_proposal.status, penjadwalan.tanggal FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim join penjadwalan ON mahasiswa_metopen.nim=penjadwalan.nim JOIN penguji ON penjadwalan.id_jadwal=penguji.id_jadwal and mahasiswa_metopen. nim=$nim";

			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function UrutkanPengumumanSempropBerdasarkanNilai(){ 
			//Dikerjakan oleh Firman Cahyono

			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs , SUM(seminar_proposal.nilai_proses_pembimbing+seminar_proposal.nilai_ujian_pembimbing+seminar_proposal.nilai_ujian_penguji) as nilai, seminar_proposal.status FROM mahasiswa_metopen JOIN seminar_proposal ON mahasiswa_metopen.nim=seminar_proposal.nim group by mahasiswa_metopen.nim ORDER BY seminar_proposal.nim ASC";
			
			$this->eksekusi($query);
			return $this->hasil;
				
		}

		public function HitungJumlahMahasiswaLulusSemprop(){
			//Dikerjakan oleh Febri Ramadhan

			$query = "SELECT COUNT(seminar_proposal.status ) as lulus FROM seminar_proposal WHERE status='lulus'";
			
			$this->eksekusi($query);
			return $this->hasil;

			
		}

		public function HitungJumlahMahasiswaTidakLulusSemprop(){
			//Dikerjakan oleh Mohammad Ibrahim


			$query = "SELECT COUNT(seminar_proposal.status ) as tidak_lulus FROM seminar_proposal WHERE status='tidak_lulus'";
			
			$this->eksekusi($query);
			return $this->hasil;

		}
		public function cetak($nim){


			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, seminar_proposal.nilai_proses_pembimbing, seminar_proposal.nilai_ujian_pembimbing, seminar_proposal.nilai_ujian_penguji from mahasiswa_metopen join dosen on mahasiswa_metopen.dosen=dosen.niy join seminar_proposal on mahasiswa_metopen.nim=seminar_proposal.nim where mahasiswa_metopen.nim=$nim";
			
			$this->eksekusi($query);
			return $this->hasil;

		}
		

		



		

	}


 ?>