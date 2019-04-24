<?php
//JAWABAN UTS 

	//1. 1700018137
	//2. 1700018123
	//3. 1700018125
	//4. 1700018142
	//5. 1700018124
	//6. 1700018135
	//7. 1700018146
	//8. 1700018131

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



		
		public function CariDataMahasiswaBerdasarkanNimpd($nim){
			//Dikerjakan oleh Aditya Angga Ramadhan (1700018131)

			//UTS No 2. Penjelasan Function

				// fungsi ini bernama CariMahasiswaBerdasarkanNimpd , fungsi ini digunakan untuk searching atau pencarian data mahasiswa pada level admin yang akan menginputkan nilai ujian pendadaran, yang meliputi data : nim, nama mahasiswa, nama dosen pembimbing, id dosen penguji.
				// fungsi ini menjoinkan 4 tabel yaitu tabel mahasiswa_metopen, dosen, penjadwalan dan penguji dengan primary key tabel mahasiswa metopen yaitu nim, tabel dosen yaitu niy, tabel penjadwalan yaitu id_jadwal,tabel penguji yaitu id_penguji
				// tabel mahasiswa_metopen yang terfapat FK dosen join dengan tabel dosen pada PK niy, kemudian mahasiswa_metopen pada PK nim join dengan penjadwalan pada FK nim , kemudian tabel penjadwalan pada PK id jadwal join dengan tabel penguji pada FK id_jadwal, dan $nim sebagai parameter untuk mengirim mahasiswa_metopen.nim pada variabel $nim di function  CariDataMahasiswaBerdasarkanNimpd($nim) 

			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, dosen.nama as nama_dsn, penguji.id_penguji as id_penguji, skripsi.judul_skripsi, penjadwalan.tanggal FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join penguji on penjadwalan.id_jadwal=penguji.id_jadwal join skripsi on mahasiswa_metopen.nim=skripsi.nim and mahasiswa_metopen.nim=$nim";

			$this->eksekusi($query); //untuk mengeksekusi query
			return $this->hasil; // menampilkan hasil query
			
		}

		public function LihatTanggalUjianPendadaran(){
			//Dikerjakan oleh Satria Gradienta (1700018125)
			//Jawaban No.2 Penjelasan

				//Fungsi ini untuk melihat Tanggal Ujian Pendadaran
				//Fungsi ini akan menampilkan Nim, Nama Mahasiswa, Topik, Nama Dosen, Penguji, Tanggal
				//Dari tabel mahasiswa metopen di joinkan dengan tabel dosen disatukan premery key di dosen, kemudian di joinkan dengan tabel Penjadwalan disatukan premery key di nim, kemudian di joinkan dengan tabel penguji di satukan premery key di id_jadwal
				//Untuk mengeksekusi query dengan menggunakan $this->eksekusi($query);
				//Untuk pengembalian fungsi query dengan menggunakan return $this->hasil;
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama AS nama_mhs, mahasiswa_metopen.topik, dosen.nama AS nama_dsn, penguji.id_penguji AS penguji, penjadwalan.tanggal FROM mahasiswa_metopen JOIN dosen ON mahasiswa_metopen.dosen=dosen.niy JOIN penjadwalan ON mahasiswa_metopen.nim=penjadwalan.nim JOIN penguji ON penjadwalan.id_jadwal=penguji.id_jadwal";
			
			$this->eksekusi($query);
			return $this->hasil;
		
			
			
		}

		public function LihatDataHasilInputanNilaiDanStatusPendadaran(){
			//Dikerjakan oleh Iftitah Dwi Ulumiyah

			$query = "SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs,ujian_pendadaran.nilai_penguji_1 as nilai_penguji_1, ujian_pendadaran.nilai_penguji_2 as nilai_penguji_2, ujian_pendadaran.nilai_pembimbing as nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen JOIN ujian_pendadaran ON mahasiswa_metopen.nim=ujian_pendadaran.nim";
			
			$this->eksekusi($query);
			return $this->hasil;
			//jawaban No. 5
			//pada query ini menampilkan data hasil inputan nilai dan Status Pendadaran.Pertama kita melakukan join tabel mahasiswa_metopen  dan ujian_pendadaran
			//pada kondisi ini nim pada tabel mahasiswa_metopen dan nim pada tabel  ujian_pendadaran sama  untuk mendapatkan nilai_penguji_1,status,nilai_penguji_2,nilai_pembimbing.
		
			
		}

		public function DeleteDataPendadaran($nim){
			//Dikerjakan oleh Rafida Kumalasari (1700018123)
			//Sudah dikerjakan oleh Rafida
			$query="DELETE FROM ujian_pendadaran WHERE nim='$nim'";	
			// query ini diperuntukkan untuk menghapus data dari tabel ujian pendadaran berdasarkan nim mana yang mau dihapus 
			$this->eksekusi($query);
			return $this->hasil;
			
			
		}

		public function InputNilaiDanStatusPendadaran($nim,$id_pendadaran,$status,$nilai_penguji_1,$nilai_penguji_2,$nilai_pembimbing){
			//Dikerjakan oleh Muhammad Adi Rezky (1700011842)

				// jawaban No.2
			 //  fungsi ini bernama InputNilaiDanStatussPendadaran
			// Dimana fungsi ini akan menginputkan nilai dan status mahasiswa yang ada diseminar proposal
			// yang di inputkan yaitu nilai_penguji_1, nilai_penguji_2 dan nilai_pembimbing
			// untuk nim udah ada di mahasiswa metopen tinggal di paste aja, kemudian id_pendadaran tinggal di samain dengan nim
			// untuk mengeksekusi query menggunakan "$this->eksekusi($query);"
			// dan untuk pengembalian fungsi InputNilaiDanStatusPendadaran menggunakan "return $this->hasil;".

			$query = "INSERT INTO ujian_pendadaran VALUES ('$nim','$id_pendadaran','$status','$nilai_penguji_1','$nilai_penguji_2','$nilai_pembimbing')";
			$this->eksekusi($query);
			return $this->hasil;
		}
		
		public function UpdateNilaiDanStatusPendadaran1($nim,$status,$nilai_penguji_1,$nilai_penguji_2,$nilai_pembimbing){
			//Dikerjakan oleh Rizal Adijisman (1700018135)
			//fungsi ini untuk mengupdate nilai dan status mahasiswa
			$query="UPDATE ujian_pendadaran SET status='$status', nilai_penguji_1='$nilai_penguji_1', nilai_penguji_2='$nilai_penguji_2', nilai_pembimbing='$nilai_pembimbing' WHERE nim='$nim'";
			//query ini untuk meng-update nilai dan status mahasiswa yang sudah diubah pada from update
			$this->eksekusi($query); //untuk mengeksekusi query diatas
			return $this->hasil; //menampilkan hasil query			
		}

		public function UpdateNilaiDanStatusPendadaran2($nim){ //sudah??
			//Dikerjakan oleh Rizal Adijisman (1700018135)
			//fungsi ini bernama UpdateNilaiDanStatusPendadaran2
			//fungsi ini untuk menampilkan form update nilai dan status dari data mahasiswa yg mengikuti pendadaran
			$query="SELECT mahasiswa_metopen.nim as nim, mahasiswa_metopen.nama as nama_mhs ,ujian_pendadaran.nilai_penguji_1,ujian_pendadaran.nilai_penguji_2, ujian_pendadaran.nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen JOIN ujian_pendadaran ON mahasiswa_metopen.nim=ujian_pendadaran.nim and mahasiswa_metopen.nim=$nim";
			//untuk menampilkan from update berdasarkan nim yang dipilih untuk diupdate
			
			$this->eksekusi($query); //untuk mengeksekusi query diatas
			return $this->hasil; //mengembalikan hasil query diatas
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
			//Dikerjakan oleh Lalu Hendri Bagus Wira S (1700018146)
			//fungsi ini bernama CariMahasiswaBerdasarkanNimPadaPengumumanHasilPendadaran
			//fungsi ini  untuk mencari data hasil ujian pendadaran mahasiswa berdasarkan nim dengan menginputkan nim sebagai keynya
			//nanti outputnya itu menampilkan NIM,Nama Mahasiswa,Tanggal Ujian,judul skripsi,nilai penguji 1,id skripsi,nilai penguji 2,nilai pembimbimng,status, action(update dan delete)
			//di fungsi ini kita menjoinkan tiga tabel yaitu tabel mahasiswa_metopen,skripsi,penjadwalan dan ujian_pendadaran
			$query = "SELECT mahasiswa_metopen.nim, mahasiswa_metopen.nama as nama_mhs, penjadwalan.tanggal,skripsi.judul_skripsi, ujian_pendadaran.nilai_penguji_1,ujian_pendadaran.id_skripsi,ujian_pendadaran.nilai_penguji_2,ujian_pendadaran.nilai_pembimbing, ujian_pendadaran.status FROM mahasiswa_metopen JOIN skripsi ON mahasiswa_metopen.nim=skripsi.nim join penjadwalan on mahasiswa_metopen.nim=penjadwalan.nim join ujian_pendadaran on mahasiswa_metopen.nim=ujian_pendadaran.nim AND mahasiswa_metopen.nim=$nim";

			$this->eksekusi($query); //untuk eksekusi query
			return $this->hasil; //untuk menampilkan hasil query
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